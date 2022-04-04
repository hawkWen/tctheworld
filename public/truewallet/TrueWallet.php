<?php
class TrueWallet
{
    public $config = array();
    public $config_path = null;
    public $curl_options = null;
    public $data = null;
    public $response = null;
    public $http_code = null;
    public $mobile_api_gateway = "https://tmn-mobile-gateway.truemoney.com/tmn-mobile-gateway/";
    public $mobile_api_endpoint = "/tmn-mobile-gateway/";
    public $app_version = "5.25.1";
    public $remote_key_urls = ["https://gateway.truewallet.app","https://gateway-01.truewallet.app","https://gateway-02.truewallet.app","https://gateway-03.truewallet.app","https://gateway-04.truewallet.app"];
    public $remote_key_id; // DO NOT EDIT THIS
    public $remote_key_value; // DO NOT EDIT THIS
    public function prepare_identity()
    {
        $device_brands = array("samsung");
        $device_models = array(
            "SM-N950N", "SM-G930K", "SM-G955N", "SM-G965N",
            "SM-G930L", "SM-G925F", "SM-N950F", "SM-N9005",
            "SM-G9508", "SM-N935F", "SM-N950W", "SM-G9350",
            "SM-G955F", "SM-N950U", "SM-G955U", "SM-G950U1"
        );
        if (!isset($this->config["device_id"])) {
            $this->updateConfig("device_id", substr(md5(microtime() . uniqid()), 16));
        }
        if (!isset($this->config["mobile_tracking"])) {
            $this->updateConfig("mobile_tracking", base64_encode(openssl_random_pseudo_bytes(40)));
        }
        if (!isset($this->config["device_brand"]) || !isset($this->config["device_model"])) {
            $this->updateConfig("device_brand", $device_brands[array_rand($device_brands)]);
            $this->updateConfig("device_model", $device_models[array_rand($device_models)]);
        }
        return true;
    }
    public function __construct($config = null)
    {
        if (is_string($config)) {
            $this->setConfigPath($config);
        } elseif (is_array($config)) {
            $this->updateConfig($config);
            $this->prepare_identity();
        }
    }
    public function setConfigPath($path = null, $merge = false, $reset = true)
    {
        $this->config_path = is_null($path) ? null : strval($path);
        if (!is_null($this->config_path)) {
            if ($reset) $this->config = array();
            if ($merge) $merge_config = $this->config;
            if (!file_exists($this->config_path)) file_put_contents($this->config_path, json_encode($this->config));
            $this->config = json_decode(file_get_contents($this->config_path), true);
            if ($merge) $this->config = array_replace($this->config, $merge_config);
        }
        $this->updateConfig();
        $this->prepare_identity();
        return true;
    }
    public function setConfig($config = null)
    {
        if (is_null($config)) $config = array();
        $this->config = $config;
        $this->updateConfig();
        $this->prepare_identity();
    }
    public function updateConfig($name = null, $value = null)
    {
        if (is_array($name)) {
            $this->config = array_replace($this->config, $name);
            foreach ($this->config as $name => $value) {
                if (is_null($value)) unset($this->config[$name]);
            }
        } elseif (is_string($name)) {
            if (!is_null($value)) {
                $this->config[$name] = $value;
            } else {
                unset($this->config[$name]);
            }
        }
        if (isset($this->config["no_file"]) && $this->config["no_file"]) $this->config_path = null;
        if (!is_null($this->config_path)) file_put_contents($this->config_path, json_encode($this->config));
        if (isset($this->config["username"]) && !isset($this->config["type"])) {
            $this->updateConfig("type", "mobile");
        }
        if ((!isset($this->config["no_file"]) || !$this->config["no_file"]) && is_null($this->config_path) && isset($this->config["username"])) {
            $this->setConfigPath(dirname(__FILE__) . "/" . $this->config["username"] . ".identity", true, false);
        }
        return $this->config;
    }
    public function request($method, $endpoint, $headers = array(), $data = null)
    {
        $this->data = null;
        $handle = curl_init();
        if (!is_null($data)) {
            curl_setopt($handle, CURLOPT_POSTFIELDS, is_array($data) ? json_encode($data) : $data);
            if (is_array($data)) $headers = array_merge(array("Content-Type" => "application/json"), $headers);
        }
        curl_setopt_array($handle, array(
            CURLOPT_URL => rtrim($this->mobile_api_gateway, "/") . $endpoint,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => "okhttp/4.4.0",
            CURLOPT_HTTPHEADER => $this->buildHeaders($headers)
        ));
        if (is_array($this->curl_options)) curl_setopt_array($handle, $this->curl_options);
        $this->response = curl_exec($handle);
        $this->http_code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($result = json_decode($this->response, true)) {
            if (isset($result["data"])) $this->data = $result["data"];
            return $result;
        }
        return $this->response;
    }
    public function buildHeaders($array)
    {
        $headers = array();
        foreach ($array as $key => $value) {
            $headers[] = $key . ": " . $value;
        }
        return $headers;
    }
    public function getTimestamp()
    {
        return strval(floor(microtime(true) * 1000));
    }
    public function calculate_singature($data)
    {
        $key["username"] = $this->config["username"];
        $key["device_id"] = $this->config["device_id"];
        $key["data"] = $data;
        $curl = curl_init();
        $remote_key_url = $this->remote_key_urls[array_rand($this->remote_key_urls)];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $remote_key_url . '/cal.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => ($key),
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($http_code == 200 && $result = json_decode($response, true)) {
            if (isset($result["device"]) && is_string($result["device"])) {
                $this->remote_key_id = $result["device"];
            }
            if (isset($result["key"]) && is_string($result["key"])) {
                $this->remote_key_value = $result["key"];
            }
            return $this->remote_key_value;
        }
    }
    public function Login()
    {
        if (!isset($this->config["pin"]) || !isset($this->config["tmn_id"]) || !isset($this->config["login_token"])) return false;
        $wallet_pin = hash('sha256', $this->config["tmn_id"] . $this->config["pin"]);
        $this->calculate_singature($this->config["login_token"] . '|' . $wallet_pin);

        $result = $this->request("POST", "/mobile-auth-service/v1/pin/login", array(
            "Authorization" => strval($this->config["login_token"]),
            "X-Device" => strval($this->remote_key_id),
            "X-Geo-Position" => "lat=; lng=",
            "X-Geo-Location" => "city=; country=; country_code= ",
            "Signature"   => $this->remote_key_value
        ), array(
            "pin" => hash("sha256", strval($this->config["tmn_id"]) . strval($this->config["pin"])),
            "app_version" => $this->app_version
        ));
        if (isset($result["data"]["access_token"])) $this->updateConfig("access_token", $result["data"]["access_token"]);
        return $result;
    }
    public function GetProfile()
    {
        if (!isset($this->config["access_token"])) return false;
        return $this->request("GET", "/user-profile-composite/v1/users/", array(
            "Authorization" => strval($this->config["access_token"])
        ));
    }
    public function GetBalance()
    {
        if (!isset($this->config["access_token"])) return false;
        return $this->request("GET", "/user-profile-composite/v1/users/balance/", array(
            "Authorization" => strval($this->config["access_token"])
        ));
    }
    public function GetTransaction($limit = 20, $page = 1, $start_date = null, $end_date = null)
    {

        if (!isset($this->config["access_token"])) return false;
        if (is_null($start_date) && is_null($end_date)) $start_date = date("Y-m-d", strtotime("-90 days") - date("Z") + 25200);
        if (is_null($end_date)) $end_date = date("Y-m-d", strtotime("+1 day") - date("Z") + 25200);
        if (is_null($start_date) || is_null($end_date)) return false;
        $query = http_build_query(array(
            "start_date" => strval($start_date),
            "end_date" => strval($end_date),
            "limit" => intval($limit),
            "page" => intval($page),
            "type" => "",
            "action" => ""
        ));
        $hash = rtrim($this->mobile_api_endpoint, "/") . "/history-composite/v1/users/transactions/history/?" . $query;
        $this->calculate_singature($hash);
        $data = $this->request("GET", "/history-composite/v1/users/transactions/history/?" . $query, array(
            "Authorization" => strval($this->config["access_token"]),
            "Signature"     => $this->remote_key_value,
            "X-Device"      => $this->remote_key_id,
        ));
        return $data;
    }
    public function GetTransactionReport($report_id)
    {
        if (!isset($this->config["access_token"])) return false;
        $hash =  rtrim($this->mobile_api_endpoint, "/") . "/history-composite/v1/users/transactions/history/detail/" . $report_id;

        $this->calculate_singature($hash);
        return $this->request("GET", "/history-composite/v1/users/transactions/history/detail/" . $report_id, array(
            "X-Device" => $this->remote_key_id,
            "Authorization" => strval($this->config["access_token"]),
            "Signature"     => $this->remote_key_value,
        ));
    }
}
?>
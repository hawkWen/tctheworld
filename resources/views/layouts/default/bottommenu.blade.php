    <div class="appBottomMenu">
        <a href="/" class="item @if($pageactive=='') active @endif">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>กระเป๋า</strong>
            </div>
        </a>
        <a href="#" class="item" data-toggle="modal" data-target="#actionSheetInset">
            <div class="col">
                <ion-icon name="caret-down-circle-outline"></ion-icon>
                <strong>ฝากเงิน</strong>
            </div>
        </a>
        <a href="{{ secure_url('games') }}" class="item">
            <div class="col">
                <div class="action-button large">
                    <ion-icon name="game-controller-outline"></ion-icon>
                </div>
            </div>
        </a>
        <a href="#" class="item" data-toggle="modal" data-target="#withdrawActionSheet">
            <div class="col">
                <ion-icon name="caret-up-circle-outline"></ion-icon>
                <strong>ถอนเงิน</strong>
            </div>
        </a>
        <a href="{{ secure_url('profile') }}" class="item @if($pageactive=='profile') active @endif">
            <div class="col">
                <ion-icon name="person-circle-outline"></ion-icon>
                <strong>โปรไฟล์</strong>
            </div>
        </a>
    </div>
<div>
    <div class="border rounded p-3 mb-5">
        <h5 class="mb-0">Balance</h5>
        <h1>Rp. {{ $amount }}</h1>
    </div>
    <div class="flex">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDeposit">Deposit</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalWithdrawal">Withdrawal</button>
    </div>

    <div class="modal fade" id="modalDeposit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deposit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" class="form-control" wire:model="depositAmount"></input>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" wire:click="deposit" data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalWithdrawal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Withdrawal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" class="form-control" wire:model="depositAmount"></input>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" wire:click="withdrawal" data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>

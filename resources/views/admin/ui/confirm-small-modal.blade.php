<div class="modal fade" id="confirm-small-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content pb-3">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="confirm-small-modal__title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body d-flex flex-column">
                    <h4 id="confirm-small-modal__message" class="header-title"></h4>
                    <span id="confirm-small-modal__line-1"></span>
                    <span id="confirm-small-modal__line-2"></span>                  
                </div>
                <div class="d-flex justify-content-end px-3">
                    <button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal" aria-label="Close">Hủy</button>
                    <button 
                        class="btn btn-danger btn-sm" 
                        id="confirm-small-modal__btn-submit"
                        style="margin-left: 5px"
                        type="submit"
                    >                       
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
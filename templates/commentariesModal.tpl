<div class="modal fade" id="modal_commentaries" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                {include file="./vue/commentary.vue"}
            </div>
            {if isset($smarty.session.isLogged)}
            <div class="container">
                <div class="container" id="contact_container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-8 pb-5">
                            <form>
                                <div class="card border-secondary rounded-0">
                                    <div class="card-header p-0">
                                        <div class="bg-secondary text-white text-center py-2">
                                            <p class="m-0">Leave a comment for this product!</p>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-star text-secondary"></i></div>
                                                </div>
                                                <input type="number" class="form-control" id="commentary_rating" name="rating" placeholder="Rate" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-envelope text-secondary"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="commentary_from" name="from" placeholder="El Fran" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-comment text-secondary"></i></div>
                                                </div>
                                                <textarea method="post" id="body_commentary" class="form-control" placeholder="Comment here!" required name="message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             {/if}
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>                               
                <input type="submit" value="Send commentary" data-idToSend=" " id="submit_commentary_button" class="btn btn-primary">                
            </div>                
        </div>
    </div>
</div>
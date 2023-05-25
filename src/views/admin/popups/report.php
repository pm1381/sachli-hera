<?php 
    
?>
<div class="popupPage normalPopup reportPopup">
    <div class="popupHeader">
        <h3>گزارش</h3>
        <svg xmlns="http://www.w3.org/2000/svg" class="popupClose" width="20px" height="20px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><polygon points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512     512,452.922 315.076,256   "/></g></g></svg>
    </div>

    <label for="textP" class="popupLabel">توضیحات</label>
    <textarea type="text" class="form-control descriptionReport" style="height: 313px;" name="textP"></textarea>
    <div class="btn btn-primary later submitReport" data-id="0" data-current="<?php echo $current->data->id ?>">ثبت گزارش</div>

</div>
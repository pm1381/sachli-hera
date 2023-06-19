<?php

?>

<form method="POST" id="formContent" action="<?php echo ORIGIN . "consult/" ?>" class="main consultForm gapBetween mx-auto eachSec">
    <h2 class="hClass">فرم مشاوره رایگان</h2>
    <div class="formContent">
        <div class="formInputs righty">
            <div class="consultInput">
                <label for="name">نام</label>
                <input type="text" name="name" style="border-top-right-radius: 20px;" class="formInput homeInput">
            </div>
            <div class="consultInput">
                <label for="name">نام خانوادگی</label>
                <input type="text" name="surname" class="formInput homeInput">
            </div>
            <div class="consultInput">
                <label for="name">شماره تلفن همراه</label>
                <input type="text" name="mobile" style="border-bottom-right-radius: 20px;" class="formInput homeInput">
            </div>
        </div>
        <div class="formInputs lefty" >
            <div class="consultInput">
                <label for="name">فیلد</label>
                <!-- <input type="text" name="field" style="border-top-left-radius: 20px;" class="formInput homeInput"> -->
                <select name="field" style="border-top-left-radius: 20px;" class="formInput homeInput">
                    <option value="0">انتخاب کنید</option>
                </select>
            </div>
            <div class="leftconsultInput">
                <label for="name">توضیحات(اختیاری)</label>
                <textarea type="text" name="name" style="border-bottom-left-radius: 20px;" class="formInput formText homeInput"></textarea>
            </div>
        </div>
    </div>
    <input type="submit" class="manageActions btn-home-send" value="ارسال فرم مشاوره">
</form>


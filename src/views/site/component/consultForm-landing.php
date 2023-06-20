<?php

use App\Helpers\Arrays;
use App\Helpers\Tools;

?>

<div class="main consultForm consultForm-landing gapBetween mx-auto eachSec">
    <h2 class="hClass consult-title-landing">فرم مشاوره رایگان</h2>
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
                <select name="field" style="border-top-left-radius: 20px;" class="formInput homeInput">
                    <option value="0">انتخاب کنید</option>
                    <?php echo Tools::option(Arrays::field()) ?>
                </select>
            </div>
            <div class="leftconsultInput">
                <label for="name">توضیحات(اختیاری)</label>
                <textarea type="text" name="description" style="border-bottom-left-radius: 20px;" class="formInput formText homeInput"></textarea>
            </div>
        </div>
    </div>
    <button class="manageActions manageActions-landing send-req">ارسال فرم مشاوره</button>
</div>


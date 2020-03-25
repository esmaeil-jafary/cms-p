/*برای استفاده از دیتا تیبل آماده دستورات جیکوری را نوشته تا اضافه شود*/
$(document).ready(function () {
$('#categoryTable').DataTable();
// برای اینکه در پوست ها هم بتوانیم از ددیتا تیبل استفاده کنیم نتام جدول آن را نیز از جدول پست اضافه می کنیم
    $('#PostTable').DataTable();
} );
// برای سی کی هدیتور می باشد و در هرکجا که تگ تکست اریا داریم ای دی آن را ادیتور قرر بدهیم این ادیتور نمایش داده می شود
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
// برای ایجاد پیام مطمن هستید می خواهید پاک کنید پست ها را و بقیه چیز ها
function confirmMessage() {
    return confirm("برای حذف کردن مطمئن هستید؟");

}
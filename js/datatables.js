/*برای استفاده از دیتا تیبل آماده دستورات جیکوری را نوشته تا اضافه شود*/
$(document).ready(function () {
$('#categoryTable').DataTable();
// برای اینکه در پوست ها هم بتوانیم از ددیتا تیبل استفاده کنیم نتام جدول آن را نیز از جدول پست اضافه می کنیم
    $('#PostTable').DataTable();
} );
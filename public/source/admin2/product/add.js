$(function () {
    $(".tags-select-choose").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $(".").select2({
        placeholder: "chọn danh mục",
        allowClear:true
    });
})
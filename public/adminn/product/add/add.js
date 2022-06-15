$(".tags_select_choose").select2({
    placeholder: "Select tag", //placeholder
    tags: true,
    tokenSeparators: ["/", ",", ";"],
});
$(".select2_init").select2({
    allowClear: true,
    placeholder: "Chọn danh mục",
});

$(".select2_init_brand").select2({
    allowClear: true,
    placeholder: "Chọn thương hiệu",
});
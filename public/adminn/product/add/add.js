$(".tags_select_choose").select2({
    placeholder: "Chọn tag", //placeholder
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
$(".menu_select_choose").select2({
    placeholder: "Chọn kho", //placeholder
    tags: true,
    tokenSeparators: ["/", ",", ";"],
    maximumSelectionLength: 3, /// tối đa 3
});

(function ($) {
    "use strict";

    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('text', options);

    window.dynamicRow = {
        rowIndex: 1,
        generateRow: function (index) {
            return `<div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-label-group">
                                    <input type="text" id="link_titles${index}" name="link_titles[]" class="form-control"
                                           placeholder="عنوان لینک" autocomplete="title">
                                    <label for="link_titles${index}">
                                    عنوان لینک
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-label-group">
                                    <input type="text" id="link_names${index}" name="link_names[]" class="form-control"
                                           placeholder="متن لینک" autocomplete="name">
                                    <label for="link_names${index}">
                                    متن لینک
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-10 col-xl-5">
                                <div class="form-label-group">
                                    <input type="url" id="link_urls${index}" name="link_urls[]" class="form-control"
                                           placeholder="لینک منبع" autocomplete="url">
                                    <label for="link_urls${index}">
                                    آدرس لینک
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-2 col-xl-1">
                                <button type="button" class="btn btn-primary btn-block mw-auto mb-3 mb-md-0" onclick="dynamicRow.toggleToRemove(event)">
                                    <i class="far fa-plus"></i>
                                </button>
                            </div>
                        </div>`;
        },
        newRow: function () {
            $('#link_row').append(dynamicRow.generateRow(++dynamicRow.rowIndex));
        },
        deleteRow: function (button) {
            button = dynamicRow.getButton(button);
            button.parentElement.parentElement.remove();
        },
        getButton: function (element) {
            while (element.tagName.toLowerCase() !== 'button') {
                element = element.parentElement;
            }
            return element;
        },
        toggleToRemove: function (e) {
            var tag = dynamicRow.getButton(e.target);
            tag.outerHTML = `<button type="button" class="btn btn-danger btn-block mw-auto mb-3 mb-md-0" onclick="dynamicRow.deleteRow(event.target)">
                                    <i class="far fa-trash-alt"></i>
                                </button>`;
            dynamicRow.newRow();
        }
    }
    dynamicRow.newRow();
})(jQuery);

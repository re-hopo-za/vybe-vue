/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.addTemplates("default", {
    imagesPath: CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates") + "templates/images/"),
    templates: [{
        title: "قالب دو ستونه",
        image: "2row.jpg",
        html: '<div class="row"><div class="col-12">محتوای_بالا</div><div class="col-12 col-md-6">محتوای_ستون_اول</div><div class="col-12 col-md-6">محتوای_ستون_دوم</div><div class="col-12">محتوای_پایین</div></div>'
    }, {
        title: "قالب سه ستونه",
        image: "3row.jpg",
        html: '<div class="row"><div class="col-12">محتوای_بالا</div><div class="col-12 col-sm-6 col-lg-4">محتوای_ستون_اول</div><div class="col-12 col-sm-6 col-lg-4">محتوای_ستون_دوم</div><div class="col-12 col-sm-6 col-lg-4">محتوای_ستون_سوم</div><div class="col-12">محتوای_پایین</div></div>'
    }, {
        title: "قالب چهار ستونه",
        image: "4row.jpg",
        html: '<div class="row"><div class="col-12">محتوای_بالا</div><div class="col-12 col-sm-6 col-lg-3">محتوای_ستون_اول</div><div class="col-12 col-sm-6 col-lg-3">محتوای_ستون_دوم</div><div class="col-12 col-sm-6 col-lg-3">محتوای_ستون_سوم</div><div class="col-12 col-sm-6 col-lg-3">محتوای_ستون_چهارم</div><div class="col-12">محتوای_پایین</div></div>'
    }]
});
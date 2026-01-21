jQuery(document).ready(function ($) {

    // Tab Switching
    $('.wppg-tab-link').on('click', function (e) {
        e.preventDefault();

        // Remove active class from all tabs
        $('.wppg-tab-link').removeClass('active');
        $('.wppg-tab-content').removeClass('active');

        // Add active class to clicked tab
        $(this).addClass('active');

        // Show target content
        var target = $(this).data('tab');
        $('#' + target).addClass('active');
    });

    // Template Mode Selection Logic
    // Template Mode Selection Logic
    $('.wppg-template-selector input[type="radio"]').on('change', function () {
        // Remove 'selected' class from all options
        $('.wppg-template-selector .template-option').removeClass('selected');

        // Add 'selected' class to the parent label of the checked input
        $(this).closest('.template-option').addClass('selected');
    });

    // Media Uploader
    var mediaUploader;

    $('#wppg-upload-btn').on('click', function (e) {
        e.preventDefault();

        // If the uploader object has already been created, reopen the dialog
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Developer Photo',
            button: {
                text: 'Choose Photo'
            },
            multiple: false
        });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#wppg-dev-photo').val(attachment.url);
            $('#wppg-img-preview').attr('src', attachment.url).show();
            $('#wppg-remove-btn').show();
        });

        // Open the uploader dialog
        mediaUploader.open();
    });

    // Remove Image
    $('#wppg-remove-btn').on('click', function (e) {
        e.preventDefault();
        $('#wppg-dev-photo').val('');
        $('#wppg-img-preview').attr('src', '').hide();
        $(this).hide();
    });

});

jQuery(document).ready(function ($) {
  // Function to handle image selection
  function handleImageSelection(inputId, buttonId) {
    $(buttonId).on("click", function () {
      var mediaUploader;
      if (mediaUploader) {
        mediaUploader.open();
        return;
      }
      mediaUploader = wp.media.frames.file_frame = wp.media({
        title: "Choose Image",
        button: {
          text: "Choose Image",
        },
        multiple: false,
      });
      mediaUploader.on("select", function () {
        var attachment = mediaUploader
          .state()
          .get("selection")
          .first()
          .toJSON();
        $(inputId).val(attachment.url);
      });
      mediaUploader.open();
    });
  }

  // Handle image selection for all hero item image fields
  handleImageSelection(
    "#hero_item_1_metabox_image_url",
    "#hero_item_1_metabox_upload_image_url"
  );
  handleImageSelection(
    "#hero_item_2_metabox_image_url",
    "#hero_item_2_metabox_upload_image_url"
  );
  handleImageSelection(
    "#hero_item_3_metabox_image_url",
    "#hero_item_3_metabox_upload_image_url"
  );

  // Handle image selection for gallery image fields
  for (var i = 1; i <= 8; i++) {
    handleImageSelection("#gallery_image_" + i, "#upload_gallery_image_" + i);
  }
});

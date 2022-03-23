<script>
  function previewImg() {
    const sampul = document.querySelector("#thumbnail");
    const imgPreview = document.querySelector("#img-preview");
    const labelFile = document.querySelector("#labelFile");

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function(e) {
      labelFile.textContent = sampul.files[0].name;
      imgPreview.src = e.target.result;
    };
  }

  $(document).ready(function() {
    $("#thumbnail").on("change", function() {
      previewImg();
    });
  });
</script>
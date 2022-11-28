<script src="<?=base_url();?>assets/mazer-main/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url();?>assets/mazer-main/dist/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url();?>assets/mazer-main/dist/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?=base_url();?>assets/mazer-main/dist/assets/js/mazer.js"></script>
    <script src="<?=base_url();?>assets/mazer-main/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>
    
      <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

<!-- toastify -->
<script src="<?=base_url();?>assets/mazer-main/dist/assets/vendors/toastify/toastify.js"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
		<!-- Simple Datatable -->
    <script>
		let table1 = document.querySelector('#table1');
		let dataTable = new simpleDatatables.DataTable(table1);

    // Filepond: Image Preview
		FilePond.create(document.querySelector('.image-preview-filepond'), {
			allowImagePreview: true,
			allowImageFilter: false,
			allowImageExifOrientation: false,
			allowImageCrop: false,
			acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
			fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
				// Do custom type detection here and return with promise
				resolve(type);
			})
		});
	</script>

	
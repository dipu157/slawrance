    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
	<!-- Bootstrap JS -->
	<script src="{{asset('/')}}js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('/')}}js/jquery.min.js"></script>
	<script src="{{asset('/')}}plugins/toastr/toastr.min.js"></script>
	<script src="{{asset('/')}}plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('/')}}plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('/')}}plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{asset('/')}}plugins/jquery-knob/excanvas.js"></script>
	<script src="{{asset('/')}}plugins/jquery-knob/jquery.knob.js"></script>
    <script src="{{asset('/')}}plugins/select2/js/select2.min.js"></script>

    <script src="{{asset('/')}}plugins/datatable/js/jquery.dataTables.min.js"></script>

    <script src="{{asset('/')}}plugins/datetimepicker/js/legacy.js"></script>
    <script src="{{asset('/')}}plugins/datetimepicker/js/picker.js"></script>
    <script src="{{asset('/')}}plugins/datetimepicker/js/picker.date.js"></script>

    <script src="{{asset('/')}}plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
    <script src="{{asset('/')}}plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
    




    <script>
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: true,
            format: 'yyyy-mm-dd',
            defaultDate: new Date(), // Set the default date to the current date
            onStart: function() {
                this.set('select', new Date()); // Pre-select the default date
            }
        });

        $('.select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
    </script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <script src="{{asset('/')}}js/index.js"></script>
	<!--app JS-->
	<script src="{{asset('/')}}js/app.js"></script>

	@stack('scripts')

</body>

</html>

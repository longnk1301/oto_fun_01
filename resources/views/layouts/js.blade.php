@section('script')
<script>
	$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $("#header").addClass("scrolling");
    } else {
        $("#header").removeClass("scrolling");
    }
});
</script>
@endsection

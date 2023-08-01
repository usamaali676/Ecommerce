    <!-- Plugins JS File -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/optional/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/optional/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    {{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}
    <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.min.js')}}"></script>

    <script>
                    $('.deleteCartItem').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id  = $(this).attr('id');

            $.ajax({

                url : "{{route('deleteitem')}}",
                type : "POST",
                data : {
                    'prod_id': prod_id,
                },
                success: function(response)
                {
                    window.location.reload();
                    // $('.mycartitems').load(location.href + " .mycartitems");
                    swal("Done!", `${response.status}`, "success");
                }
            })
        })
    </script>
    <!-- 3. AddChat JS -->
<!-- Modern browsers -->
<script type="module" src="<?php echo asset('assets/addchat/js/addchat.min.js') ?>"></script>
<!-- Fallback support for Older browsers -->
<script nomodule src="<?php echo asset('assets/addchat/js/addchat-legacy.min.js') ?>"></script>

{{-- <script>
    var botmanWidget = {
        aboutText: 'Write Something',
        introMessage: "✋ Hi! I'm form Insha Trading!",
    };
</script> --}}

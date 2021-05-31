
    <div class="wrapper">

        <div class="custom-search-input">
            <input type="text" placeholder="Search over {{count($product)}} products" id="product">
            <button type="submit"><i class="header-icon_search_custom"></i></button>
        </div>

        <div id="product_list" style="position: absolute">

        </div>

    </div>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function () {

                $('#product').on('keyup',function() {
                    var query = $(this).val();
                    var url = '{{ url('search') }}';
                    $.ajax({

                        url:url,

                        type:"GET",

                        data:{'product':query},

                        success:function (data) {

                            $('#product_list').html(data);
                        }
                    });
                    // end of ajax call
                });

                $(document).on('click', 'li', function(){

                    var value = $(this).text();
                    $('#product').val(value);
                    $('#product_list').html("");
                });
            });
        </script>

    @endpush

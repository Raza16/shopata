<div class="search_mob_wp">
    <input type="text" class="form-control" placeholder="Search over {{count($product)}} products" id="product_mob">
    <input type="submit" class="btn_1 full-width" value="Search">
</div>

<div id="product_list" style="position: absolute">

</div>

@push('script')
<script type="text/javascript">
    $(document).ready(function () {

        $('#product_mob').on('keyup',function() {
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

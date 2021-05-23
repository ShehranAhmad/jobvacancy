<ul class="list-group text-dark list-group-flush">
    @foreach($companies as $skill)


        <li class="list-group-item text-start li-click"  data-id="{{$skill->id}}" data-name="{{$skill->name}}">{{$skill->name}}</li>

    @endforeach
</ul>
<script>
    $(document).ready(function() {
        $('#append_company ul li').click(function (e) {
            let name=$(this).data('name');
            let id=$(this).data('id');
            $('#company').val(name);
            $('#company_id').val(id);
            $('#append_company').hide();

        });

    });

</script>


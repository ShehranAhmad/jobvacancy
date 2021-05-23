<ul class="list-group text-dark list-group-flush">
@foreach($skills as $skill)


    <li class="list-group-item li-click text-start" data-name="{{$skill->name}}">{{$skill->name}}</li>

@endforeach
</ul>
<script>
    $(document).ready(function() {
        $('#append ul li').click(function (e) {
            let name=$(this).data('name');
            $('#job_title').val(name);
            $('#append').hide();

        });

    });

</script>


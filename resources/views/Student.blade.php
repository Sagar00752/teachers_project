<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css' media="screen" />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
</head>
<body>
    <h2 class='head'>Tailwebs English Medium High School</h2>
    <table class='table'>
        <thead>
            <td class="td">
                <button type="button" class="btn btn-danger btn-lg addstudent">Add student</button>
            </td>
            <tr class="tr">
                <th class="th">ids</th>
                <th class="th">Name</th>
                <th class="th">Marks</th>
                <th class="th">Subject</th>
                <th class="th">Edit</th>
                <th class="th">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentdetails as $res)
            <tr>
                <td class='td studentids'>{{$res->id}}</td>
                <td class='td studentname' id='name{{$res->id}}'>{{$res->name}}</td>
                <td class='td class2'>{{$res->subject}}</td>
                <td class='td addr1'>{{$res->marks}}</td>
                <td class="td">
                    <button type="button" data-class="{{$res->subject}}" data-id="{{$res->id}}" class="btn btn-info btn-lg btnShowPopup">Edit</button>
                </td>
                <td class="td">
                    <button type="button" data-class1="{{$res->subject}}" data-id="{{$res->id}}" class="btn btn-danger btn-lg delete">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- model starts here --}}
    <div id="MyPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;</button>
                    <h4 class="modal-title"> <b>Please Edit Student details</b> </h4>
                </div>
                <div class="modal-body">
                    <b>Name</b>
                    <input type="text" class='name1 name2'>
                    <b>Subject</b>
                    <input type="text" class='address'>
                    <input type="hidden" class='result userId'>
                    <b>Marks</b>
                    <b>Subject</b>
                    <input type="text" class='subject'>
                    <input type="hidden" class='result userId'>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="submit">
                        Submit</button>
                </div>
            </div>
        </div>
    </div>
<script>
   $('.btnShowPopup').on('click', function() {
    var user_id = $(this).attr('data-id');
    $('.userId').val(user_id);
        $('.modal-title').show();
                  $('#but2').show();
                  $("#MyPopup").modal("show");
    });

    $('#submit').on('click',function(){
        var userIdFromModal = $('.userId').val();
        var name=$('.name2').val();
        var marks=$('.address').val()
        var subject = $('.subject').val()
        $.ajax({
                url: "{{ route('updatestudentdetails') }}",
                type: 'POST',
                data: {
                    name: name,
                    marks: marks,
                    subject:subject,
                    userIdFromModal:userIdFromModal,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert("updated successfully")
                },
            });

    })

    $('.delete').on('click',function(){
        var student_id = $(this).attr('data-id');
        $('.userId').val(student_id);
        $.ajax({
                url: "{{ route('deletestudent') }}",
                type: 'POST',
                data: {
                    student_id: student_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert("Deleted successfully")
                    setTimeout(function() {
                 window.location.reload();
                    }, 1000);
                },
            });

    });

    $('.addstudent').on('click', function() {
    window.location.href = '/students';
});

</script>

</body>
</html>

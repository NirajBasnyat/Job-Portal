$(document).ready(function () {

    //---------------------------------------------------------------------------------------------------------------------------------PROFILE AJAX
    //------------- ADD_PROFILE_INFO
    $(document).on('click', '.addProfileButton', function () {
        var title = $(this).parent().siblings().find('#jobTitle').val();
        var city = $(this).parent().siblings().find('#city').val();
        var country = $(this).parent().siblings().find('#country').val();
        var overview = $(this).parent().siblings().find('#overview').val();

        console.log(title);
        $.ajax({
            type: 'post',
            url: '/seeker/profile/store',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                title: title,
                city: city,
                country: country,
                overview: overview
            },
            success: function (data) {
                location.reload();
            }
        })
    })

    //------------- EDIT_PROFILE_INFO
    $(document).on('click', '.editProfileButton', function () {

        var id = $(this).parent().siblings().find('#editId').val();
        var title = $(this).parent().siblings().find('#jobTitle').val();
        var city = $(this).parent().siblings().find('#city').val();
        var country = $(this).parent().siblings().find('#country').val();
        var overview = $(this).parent().siblings().find('#overview').val();

        $.ajax({
            type: 'post',
            url: '/seeker/profile/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                title: title,
                city: city,
                country: country,
                overview: overview
            }, success: function (data) {
                location.reload();
            }
        });
    });

    //---------------------------------------------------------------------------------------------------------------------------------WORK AJAX
    //------------- ADD_WORK_INFO
    $(document).on('click', '.addWorkButton', function (e) {
        console.log('works');
        var position = $(this).parent().siblings().find('#addPosition').val();
        var company = $(this).parent().siblings().find('#addCompany').val();
        var year = $(this).parent().siblings().find('#addYear').val();
        var description = $(this).parent().siblings().find('#addDescription').val();
         e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/seeker/work/store',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                position: position,
                company: company,
                year: year,
                description: description
            }, success: function (data) {
                 location.reload();
            }
        });
    });

    //------------- EDIT_WORK_INFO
    $(document).on('click', '.editWorkButton', function (e) {
        var id = $(this).data('id');
        var position = $(this).parent().siblings().find('#editPosition').val();
        var company = $(this).parent().siblings().find('#editCompany').val();
        var year = $(this).parent().siblings().find('#editYear').val();
        var description = $(this).parent().siblings().find('#editDescription').val();
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/seeker/work/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                position: position,
                company: company,
                year: year,
                description: description
            }, success: function (data) {
                 location.reload();
                //window.location=window.location;
            }
        })
    });

    //------------- DELETE_WORK_INFO
    $(document).on('click', '.deleteWork',function (e) {
        var id = $(this).data('id');
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/seeker/work/delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function (data) {
                location.reload();
            }
        });
    });
    //---------------------------------------------------------------------------------------------------------------------------------EDUCATION AJAX
    //------------- ADD_EDUCATION_INFO

    $(document).on('click', '.addEducationButton', function (e) {
        console.log('works');
        var course = $(this).parent().siblings().find('#addCourse').val();
        var institution = $(this).parent().siblings().find('#addInstitution').val();
        var completed_year = $(this).parent().siblings().find('#addCompletedyear').val();

        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/seeker/education/store',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                course: course,
                institution: institution,
                completed_year: completed_year,
            }, success: function () {
                 location.reload();
            }
        });
    });

    //------------- EDIT_EDUCATION_INFO
    $(document).on('click', '.editEducationButton', function (e) {
        var id = $(this).data('id');
        var course = $(this).parent().siblings().find('#editCourse').val();
        var institution = $(this).parent().siblings().find('#editInstitution').val();
        var completed_year = $(this).parent().siblings().find('#editCompletedyear').val();
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: '/seeker/education/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                course: course,
                institution: institution,
                completed_year: completed_year,
            }, success: function () {
                 location.reload();
            }
        })
    });

    //------------- DELETE_WORK_INFO
    $(document).on('click', '.deleteEducation',function (e) {
        var id = $(this).data('id');
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/seeker/education/delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function (data) {
                location.reload();
            }
        });
    });

});

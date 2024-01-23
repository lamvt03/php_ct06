$(document).ready(
    () => {
        $("#frmRegForm").validate(
            {
                rules: {
                    firstName: {
                        required: true,
                        minlength: 2
                    },
                    lastName: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    rePassword: {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    firstName: {
                        required: 'Please enter a valid first name',
                        minlength: 'At least 2 characters long'
                    },
                    lastName: {
                        required: 'Please enter a valid last name',
                        minlength: 'At least 2 characters long'
                    },
                    email: {
                        required: 'Please enter a valid email',
                        email: 'Please enter a valid email'
                    },
                    password: {
                        required: 'Please enter a valid password'
                    },
                    rePassword: {
                        required: 'Please enter a valid re-password',
                        equalTo: 'Password not matching'
                    }
                }
            }
        )
    }
);
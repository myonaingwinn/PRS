<head>
    <meta charset="utf-8">
    <title>jQuery Bind Click Event to Dynamically added Elements</title>
    <script>
        $(document).ready(function() {
            $("#btn_add").click(function() {
                $("ol").append("<li>list item <a href='javascript:void(0);' class='remove'>×</a></li>");
            });
            $(document).on("click", "a.remove", function() {
                $(this).parent().remove();
            });

            // FAB
            $('.fixed-action-btn').floatingActionButton();

            // DROPDOWN
            $('.dropdown-trigger').dropdown();
        });
    </script>
    <style type="text/css">
        /* .card {
            height: 250px;
        } */
        .card .card-content {
            padding: 10px;
            border-radius: 50px;
        }

        .col .row {
            margin-left: 0rem;
            margin-right: 0rem;
            margin-bottom: 0rem;
        }

        .card .card-action {
            padding-bottom: 0px;
        }

        .row .col.s5 {
            width: 26.6666666667%;
            margin-right: 6%;
            left: auto;
            right: 0px;
        }

        .btn-large {
            width: max-content;
        }
    </style>
</head>

<body>

    <!-- STARTING BUTTON --
    <button id="btn_add" class="iFixed">Add new list item</button>
    <p>Click the above button to dynamically add new list items. You can remove it later.</p>
    <ol>
        <li>list item</li>
    </ol> -->

    <!-- CARD -->
    <div class="container">
        <div class="col s3">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s8">
                            <input placeholder="Question" type="text" class="validate">
                        </div>
                        <div class="input-field col s5 right">
                            <!-- Dropdown Trigger -->
                            <a class='dropdown-trigger waves-light btn-large' href='#' data-target='dropdown1'><i class="material-icons left">format_align_left</i>Paragraph</a>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="#!"><i class="material-icons">format_align_left</i>Paragraph</a></li>
                                <li class="divider" tabindex="-1"></li>
                                <li><a href="#!"><i class="material-icons">check_box</i>CheckBox</a></li>
                                <li class="divider" tabindex="-1"></li>
                                <li><a href="#!"><i class="material-icons">radio_button_checked</i>RadioButton</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Answer Text" type="text" class="validate" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <!-- <div class="row"> -->
                        <div class="waves-effect"><i class="material-icons">content_copy</i></div>
                        <div class="waves-effect"><i class="material-icons">delete</i></div>
                        <div class="switch right">
                            Required
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                            </label>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAB -->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul>
    </div>

    <a onclick="M.toast({html: 'I am a toast'})" class="btn">
        <i class="material-icons left">ac_unit</i>Toast!</a>

</body>

</html>
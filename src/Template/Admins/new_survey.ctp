<style type="text/css">
    .card .card-content {
        padding: 10px;
        border-radius: 50px;
    }

    .col .row {
        margin-left: 0rem;
        margin-right: 0rem;
        margin-bottom: 0rem;
    }

    /* .card .card-action {
        padding-bottom: 0px;
    } */

    .row .col.s5 {
        width: 26.6666666667%;
        margin-right: 6%;
        left: auto;
        right: 0px;
    }

    .btn-large {
        width: max-content;
    }

    .my-input-field {
        margin-top: 0.5rem;
        margin-bottom: -2rem;
    }

    .my-icon {
        color: grey;
    }

    /* FIXME: no need when card type = text */
    .my-card-action {
        margin-top: 1.5rem;
        /* margin-bottom: -0.6rem; */
    }
</style>

<!-- STARTING BUTTON --
    <button id="btn_add" class="iFixed">Add new list item</button>
    <p>Click the above button to dynamically add new list items. You can remove it later.</p>
    <ol>
        <li>list item</li>
    </ol> -->

<!-- TODO:
    1. Clone Data
    2. Select and Event
        1. Change Child (Checkbox / Radio)

    TODO: Draggleable Card
-->
<!-- CARD -->
<div class="container" id="card-1">
    <div class="col s3">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="txtQuestion-1" placeholder="Question" type="text" class="validate" require>
                    </div>
                    <!-- <div id="selDiv-1" class="input-field col s4">
                        <select id="selType-1" class="my-sel" onchange="typeChange(this)">
                            <option value="1" data-icon="/img/title.svg">Text</option>
                            <option value="2" data-icon="/img/check_box.svg">CheckBox</option>
                            <option value="3" data-icon="/img/radio_button.svg">Radio</option>
                        </select>
                        <label>Select Question Type</label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="input-field col s12"><input placeholder="Answer Text" type="text" class="validate" disabled></div>
                </div>
                <!-- <div id="child-1" class="row">
                    <div class="input-field input-icons col s1">
                        <i class="material-icons icon">check_box_outline_blank</i>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Answer Text" type="text" class="validate">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small"><i class="material-icons">add</i></a>
                    </div>
                </div> -->

                <!-- <div id="child-1" class="row">
                    <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Answer Text" type="text">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove
                            </i></a>
                    </div>

                    <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Answer Text" type="text">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                    </div>

                    <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input value="Other" type="text" disabled>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                    </div> -->

                <!-- <div class="input-field col s4 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Add option" type="text">
                    </div>
                    <div class="input-field col s3">
                        or &nbsp;<a class="waves-effect"> add "Other"</a>
                    </div> -->
            </div>

            <div class="card-action">
                <div class="row">
                    <div class="col s10"></div>
                    <!-- <div class="col s1">
                        <div id="clone-1" class="waves-effect waves-light my-btn"><i class="material-icons">content_copy</i></div>
                    </div> -->
                    <div class="col s2">
                        <div id="delete-1" class="waves-effect waves-light my-btn"><i class="material-icons ">delete</i></div>
                    </div>
                    <!-- <div class="col s5 pull-s7">
                    </div> -->
                    <!-- <div class="col s4">
                        <div class="switch">
                            Required
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                            </label>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Radio Card -->
<div class="container" id="card-3">
    <div class="col s3">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="txtQuestion-3" placeholder="Question" type="text" class="validate" require>
                    </div>
                </div>

                <div id="card-3-radio-child-1" class="row radio-child">
                    <div class="input-field col s8 my-input-field">
                        <i class="material-icons prefix my-icon">radio_button_unchecked</i>
                        <input placeholder="Option" type="text">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"><i class="material-icons">add
                            </i></a>
                    </div>

                    <!-- for Check Child -->
                    <!-- <div id="card-1-child-1" class="row check-child">
                        <div class="input-field col s8 my-input-field">
                            <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                            <input placeholder="Option" type="text">
                        </div>
                        <div class="input-field col s1">
                            <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                        </div>
                    </div> -->

                    <!-- for Other -->
                    <!-- <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input value="Other" type="text" disabled>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                    </div> -->

                    <!-- <div class="input-field col s4 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Add option" type="text">
                    </div>
                    <div class="input-field col s3">
                        or &nbsp;<a class="waves-effect"> add "Other"</a>
                    </div> -->
                </div>
            </div>

            <div class="card-action my-card-action">
                <div class="row">
                    <div class="col s10"></div>
                    <div class="col s2">
                        <div id="delete-3" class="waves-effect waves-light my-btn"><i class="material-icons ">delete</i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Check Card -->
<div class="container" id="card-2">
    <div class="col s3">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="txtQuestion-2" placeholder="Question" type="text" class="validate" require>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="input-field col s12"><input placeholder="Answer Text" type="text" class="validate" disabled></div>
                </div> -->

                <!-- <div id="child-1" class="row">
                    <div class="input-field input-icons col s1">
                        <i class="material-icons icon">check_box_outline_blank</i>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Answer Text" type="text" class="validate">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small"><i class="material-icons">add</i></a>
                    </div>
                </div> -->

                <div id="card-2-check-child-1" class="row check-child">
                    <div class="input-field col s8 my-input-field">
                        <i class="material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Option" type="text">
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"><i class="material-icons">add
                            </i></a>
                    </div>

                    <!-- for Check Child -->
                    <!-- <div id="card-1-child-1" class="row check-child">
                        <div class="input-field col s8 my-input-field">
                            <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                            <input placeholder="Option" type="text">
                        </div>
                        <div class="input-field col s1">
                            <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                        </div>
                    </div> -->

                    <!-- for Other -->
                    <!-- <div class="input-field col s8 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input value="Other" type="text" disabled>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn-floating waves-effect btn-small red lighten-1"><i class="material-icons">remove</i></a>
                    </div> -->

                    <!-- <div class="input-field col s4 my-input-field">
                        <i class="tiny material-icons prefix my-icon">check_box_outline_blank</i>
                        <input placeholder="Add option" type="text">
                    </div>
                    <div class="input-field col s3">
                        or &nbsp;<a class="waves-effect"> add "Other"</a>
                    </div> -->
                </div>
            </div>

            <div class="card-action my-card-action">
                <div class="row">
                    <div class="col s10"></div>
                    <!-- <div class="col s1">
                        <div id="clone-1" class="waves-effect waves-light my-btn"><i class="material-icons">content_copy</i></div>
                    </div> -->
                    <div class="col s2">
                        <div id="delete-2" class="waves-effect waves-light my-btn"><i class="material-icons ">delete</i></div>
                    </div>
                    <!-- <div class="col s5 pull-s7">
                    </div> -->
                    <!-- <div class="col s4">
                        <div class="switch">
                            Required
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                            </label>
                        </div>
                    </div> -->
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
        <!-- <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li> -->
        <li onclick="createCard(1)"><a class="btn-floating yellow darken-1"><i class="material-icons">title</i></a></li>
        <li onclick="createCard(2)"><a class="btn-floating green"><i class="material-icons">check_box</i></a></li>
        <li onclick="createCard(3)"><a class="btn-floating blue"><i class="material-icons">radio_button_checked</i></a></li>
    </ul>
</div>

<!-- TOAST -->
<a id="add" class="btn">
    <i class="material-icons left">ac_unit</i>Toast!</a>

<script>
    var cardCount = 1;

    $(function() {
        // sample
        /*         $("#btn_add").click(function() {
                    $("ol").append("<li>list item <a href='javascript:void(0);' class='remove'>×</a></li>");
                });

                $(document).on("click", "a.remove", function() {
                    $(this).parent().remove();
                }); */

        $("#add").click(function() {
            // var total_card = $(".container").length;
            var last_id = $(".container:last").attr('id');
            var total = $(".container").length - 1;
            // var next_id = last_id + 1;
            // $(".container:last").after(paragraph);

            // $(".container").clone().appendTo(".container:after");
            // $("body").append($("#card-1").clone(true));
            // $(this).clone().insertAfter(this);

            M.toast({
                html: "card total : " + total + ",<br> last card id : " + last_id
            });
        });

        // FAB
        $('.fixed-action-btn').floatingActionButton();
    });

    // SELECT index change event
    /*     $("select").change(function() {
            // var value = $("#selType-1").val(); //$("#selType-1 option:selected").text();
            // alert(value);
            var id = $(this).attr('id');
            alert(id);
        }); */

    /*     $('select.my-sel').on('change', function(e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            console.log(e);
        }); */

    // test select
    /*     function test(e) {
            // var id = $(this).attr('id');
            var id = e.id;
            var selected = $("#" + id).val();
            console.log(id + " " + selected);
        } */

    // Delete Card
    $(document).on("click", ".my-btn", function() {
        var clickedBtnID = $(this).attr('id');
        var id = clickedBtnID.split("-");

        $("#card-" + id[1]).remove();
        M.toast({
            html: "Deleted"
        });
    });

    // Create Card
    function createCard(type) {
        // get latest card
        var lastCardID = $(".container:last").attr('id');
        var cardTotal = $(".container").length - 1;

        if (cardTotal < 30) {

            M.toast({
                html: lastCardID
            });

            if (cardTotal > cardCount) {
                cardCount = cardTotal;
                ++cardCount;
            } else {
                ++cardCount;
            }

            var ID = 'card-' + cardCount;
            var container = $('<div class="container" id="' + ID + '"></div>');
            container.insertAfter($("#" + lastCardID));
            var card = "";

            if (type == 1) {
                card = $('<div class="col s3"><div class="card"><div class="card-content"><div class="row"><div class="input-field col s12"><input  id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div class="row"><div class="input-field col s12"><input placeholder="Answer Text" type="text" class="validate" disabled></div></div></div><div class="card-action"><div class="row"><div class="col s10"></div><div class="col s2"><div id="delete-' + cardCount + '" class="waves-effect waves-light my-btn"><i class="material-icons">delete</i></div></div></div></div></div></div></div>');
            } else if (type == 2) {
                card = $('<div class="col s3"><div class="card"><div class="card-content"><div class="row"><div class="input-field col s12"><input id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div id="card-' + cardCount + '-check-child-1" class="row check-child"> <div class="input-field col s8 my-input-field"> <i class = "material-icons prefix my-icon" > check_box_outline_blank </i> <input placeholder = "Option" type = "text"> </div> <div class = "input-field col s1" > <a class = "btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"> <i class = "material-icons"> add </i> </a> </div> </div> </div> <div class="card-action my-card-action"> <div class="row"> <div class="col s10"> </div> <div class = "col s2" >  <div id = "delete-' + cardCount + '" class = "waves-effect waves-light my-btn" > <i class = "material-icons">delete</i> </div> </div> </div > </div> </div> </div> </div > ');
            } else if (type == 3) {
                card = $('<div class="col s3"><div class="card"><div class="card-content"><div class="row"><div class="input-field col s12"><input id="txtQuestion-' + cardCount + '"  placeholder="Question" type="text" class="validate" require></div></div><div id="card-' + cardCount + '-radio-child-1" class="row radio-child"> <div class="input-field col s8 my-input-field"> <i class = "material-icons prefix my-icon" > radio_button_unchecked</i> <input placeholder = "Option" type = "text"> </div> <div class = "input-field col s1" > <a class = "btn-floating waves-effect btn-small green lighten-1" onclick="addOption(this)"> <i class = "material-icons"> add </i> </a> </div> </div> </div> <div class="card-action my-card-action"> <div class="row"> <div class="col s10"> </div> <div class = "col s2" >  <div id = "delete-' + cardCount + '" class = "waves-effect waves-light my-btn" > <i class = "material-icons">delete</i> </div> </div> </div > </div> </div> </div> </div > ');
            }

            container.append(card);
        }
    }

    // add Check/Radio Option
    function addOption(btnAdd) {
        var id = $(btnAdd).parent().parent().attr('id');
        console.log("parent id : " + id);

        if (getChildCount(id) < 9) {
            var raw = id.split('-');
            var cardNo = raw[1];
            var optionType = raw[2];
            var option = '';

            if (optionType == 'check') {
                option = '<div id="card-' + cardNo + '-check-child-x" class="row check-child"><div class="input-field col s8 my-input-field"><i class="material-icons prefix my-icon">check_box_outline_blank</i><input placeholder="Option" type="text"></div><div class="input-field col s1"><a class="btn-floating waves-effect btn-small red lighten-1 remove"><i class="material-icons">remove</i></a></div></div>';
            } else if (optionType == 'radio') {
                option = '<div id="card-' + cardNo + '-radio-child-x" class="row radio-child"><div class="input-field col s8 my-input-field"><i class="material-icons prefix my-icon">radio_button_unchecked</i><input placeholder="Option" type="text"></div><div class="input-field col s1"><a class="btn-floating waves-effect btn-small red lighten-1 remove"><i class="material-icons">remove</i></a></div></div>';
            }

            if (option != '') {
                $('#' + id).append(option);

                setNewID(id);
            }
        }
    }

    // remove Option
    $(document).on("click", "a.remove", function() {
        $(this).parent().parent().remove();
    });

    // TODO: Clone Card
    function cloneMe(id) {
        $(function() {
            $('select').formSelect();
        });

        // var cloned = $("#card-" + id).clone();
        // cloned.find("#selDiv-"+id).clear();

        // $(".container").clone().appendTo(".container:after");

        // $("body").append($("#card-1").clone(true));

        // $("#card-" + id).clone().insertAfter("#card-" + id);
    }

    function setNewID(ID) {
        var className = getClassName(ID);
        var raw = ID.split('-');
        $('#' + ID + ' > .' + className).map(function(index) {
            index += 2;
            var newID = 'card-' + raw[1] + '-' + className + '-' + index;
            $(this).attr('id', newID);
        });
    }

    function getClassName(ID) {
        var className = $('#' + ID).attr('class').split(' ').pop();
        // console.log(className);
        return className;
    }

    function getChildCount(ID) {
        var className = getClassName(ID);
        var count = $('#' + ID + ' > .' + className).length;
        // console.log(count);
        return count;
    }
</script>
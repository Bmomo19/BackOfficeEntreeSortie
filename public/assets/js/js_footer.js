
$(document).ready(function() {
let branch_all = [];

function formatResult(state) {
if (!state.id) {
    var btn = $('<div class="text-right"><button id="all-branch" style="margin-right: 10px;" class="btn btn-default">Select All</button><button id="clear-branch" class="btn btn-default">Clear All</button></div>')
    return btn;
}

branch_all.push(state.id);
var id = 'state' + state.id;
var checkbox = $('<div class="checkbox"><input id="'+id+'" type="checkbox" '+(state.selected ? 'checked': '')+'><label for="checkbox1">'+state.text+'</label></div>', { id: id });
return checkbox;   
}

function arr_diff(a1, a2) {
var a = [], diff = [];
for (var i = 0; i < a1.length; i++) {
    a[a1[i]] = true;
}
for (var i = 0; i < a2.length; i++) {
    if (a[a2[i]]) {
        delete a[a2[i]];
    } else {
        a[a2[i]] = true;
    }
}
for (var k in a) {
    diff.push(k);
}
return diff;
}

let optionSelect2 = {
templateResult: formatResult,
closeOnSelect: false,
width: '100%'
};

let $select2 = $("#country").select2(optionSelect2);

var scrollTop;

$select2.on("select2:selecting", function( event ){
var $pr = $( '#'+event.params.args.data._resultId ).parent();
scrollTop = $pr.prop('scrollTop');
});

$select2.on("select2:select", function( event ){
$(window).scroll();

var $pr = $( '#'+event.params.data._resultId ).parent();
$pr.prop('scrollTop', scrollTop );

$(this).val().map(function(index) {
    $("#state"+index).prop('checked', true);
});
});

$select2.on("select2:unselecting", function ( event ) {
var $pr = $( '#'+event.params.args.data._resultId ).parent();
scrollTop = $pr.prop('scrollTop');
});

$select2.on("select2:unselect", function ( event ) {
$(window).scroll();

var $pr = $( '#'+event.params.data._resultId ).parent();
$pr.prop('scrollTop', scrollTop );

var branch  =   $(this).val() ? $(this).val() : [];
var branch_diff = arr_diff(branch_all, branch);
branch_diff.map(function(index) {
    $("#state"+index).prop('checked', false);
});
});

$(document).on("click", "#all-branch",function(){
$("#country > option").not(':first').prop("selected", true);// Select All Options
$("#country").trigger("change")
$(".select2-results__option").not(':first').attr("aria-selected", true);
$("[id^=state]").prop("checked", true);
$(window).scroll();
});

$(document).on("click", "#clear-branch", function(){
$("#country > option").not(':first').prop("selected", false);
$("#country").trigger("change");
$(".select2-results__option").not(':first').attr("aria-selected", false);
$("[id^=state]").prop("checked", false);
$(window).scroll();
});
});

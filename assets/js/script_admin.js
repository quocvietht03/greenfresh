function changeCategory(obj){
	"use strict";
    var $this = jQuery(obj),
        $input = $this.parents(".wpb_el_type_bt_taxonomy").find(".bt_taxonomy_field"),
        arr = $input.val().split(",");
    if ($this.is(":checked")) {
        arr.push($this.val());
        var emptyKey = arr.indexOf("");
        if (emptyKey > -1) {
            arr.splice(emptyKey, 1);
        }
    } else {
        var foundKey = arr.indexOf($this.val());
        if (foundKey > -1) {
            arr.splice(foundKey, 1);
        }
    }
    $input.val(arr.join(","));
}

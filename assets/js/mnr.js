/** Created by DNP3018 -- 2019-12-19. */
var mtLanguage = 'VI';

function Load_GridHeader(iDTable, sendColumns){
    if (iDTable == "") return;
    if ( sendColumns.length > 0 ) {
        var iTR = "";
        for ( var i=0; i < sendColumns.length; i++) {
        	if ((sendColumns[i].Class_Name+"").includes("data-type-checkbox")) {
				iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="data-type-checkbox">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
			}
			else if ((sendColumns[i].Class_Name+"").includes("data-type-numeric")) {
				iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="' + sendColumns[i].Class_Name + '">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
			}
			else if ((sendColumns[i].Class_Name+"").includes("data-type-datetime")) {
				iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="data-type-datetime">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
			}
			else if ((sendColumns[i].Class_Name+"").includes("autocomplete")) {
				iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="' + sendColumns[i].Class_Name + '">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
			}
			else if ((sendColumns[i].Class_Name+"").includes("hiden-input")) {
				iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="hiden-input">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
        	}
        	else { 
				if (sendColumns[i].C_Code == "STT") {
					iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="editor-cancel">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
				}
				else {
					iTR += '<th col-name="' + sendColumns[i].C_Code + '">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
					// if((sendColumns[i].Class_Name+"").includes("data-type-checkbox")) {
					// 	iTR += '<th col-name="' + sendColumns[i].C_Code + '" class="editor-cancel">' + (mtLanguage == "VI" ? sendColumns[i].C_Name_VI : sendColumns[i].C_Name_EN) + '</th>';
					// }
					// else {
						
					// }
				}
        	}
        }
        $('#' + iDTable + ' thead tr').html(iTR);
    }
    return sendColumns.map(p=>p.C_Code);
}

function Load_Data_Grid(iDTable, sendColumns, dataX){
	if (dataX.length <= 0) return;
	var rows = [];
	for ( var i=0; i< dataX.length; i++) {
		var rData = dataX[i], r = [];
		$.each(sendColumns, function(idx, colname){
			var val = "";
			switch(colname){
				case "STT": val = i+1; break;
				default:
					if ($('th[col-name="'+colname+'"]').hasClass("data-type-datetime")) {
						val = rData[colname] ? rData[colname].split('.')[0] : "";
					}
					else if ($('th[col-name="'+colname+'"]').hasClass("data-type-checkbox")) {
						val = '<label class="checkbox checkbox-primary"><input type="checkbox" value="' + (rData[colname] == 1 ? '1" checked' : '0"') + '><span class="input-span"></span></label>';
					}
					else if ($('th[col-name="'+colname+'"]').hasClass("data-type-numeric")) {
						val = rData[colname] ? parseFloat(rData[colname]).toFixed(2) : "";
					}
					else {
						val = rData[colname] ? rData[colname] : "";
					}
					break;
			}
			r.push(val);
		});
		rows.push(r);
	}
	if (rows.length > 0) {
		$('#' + iDTable).dataTable().fnAddData(rows);
	};
}

function Load_Data_GridReport(iDTable, sendColumns, dataX, arrayColumns){
	if (dataX.length <= 0) return;
	var rows = [];
	var xxData = dataX[0];
	var xxStt = 0;
	for ( var i=0; i< dataX.length; i++) {
		var rData = dataX[i];
		var r = [];
		$.each(sendColumns, function(idx, colname){ 
			var val = "";
			if (jQuery.inArray(colname, arrayColumns) > -1) {

			}
			switch(colname) { 

			}
		});


		$.each(sendColumns, function(idx, colname){
			var val = "";
			switch(colname) {
				case "STT": val = i+1; break;
				default:
					if ($('th[col-name="'+colname+'"]').hasClass("data-type-datetime")) {
						val = rData[colname] ? rData[colname].split('.')[0] : "";
					}
					else if ($('th[col-name="'+colname+'"]').hasClass("data-type-checkbox")) {
						val = '<label class="checkbox checkbox-primary"><input type="checkbox" value="' + (rData[colname] == 1 ? '1" checked' : '0"') + '><span class="input-span"></span></label>';
					}
					else if ($('th[col-name="'+colname+'"]').hasClass("data-type-numeric")) {
						val = rData[colname] ? parseFloat(rData[colname]).toFixed(2) : "";
					}
					else {
						val = rData[colname] ? rData[colname] : "";
					}
					break;
			}
			r.push(val);
		});
		rows.push(r);
	}
	if (rows.length > 0) {
		$('#' + iDTable).dataTable().fnAddData(rows);
	};
}

// function GET_ALL_DATA_INPUT(objectX, strAttr = 'id', attrValue = ''){
function GET_ALL_DATA_INPUT(objectX, strAttr = 'id'){
	var inputData = {};
	// if (attrValue == "") {
	// 	$(objectX).find('input, select, textarea').each(function(){
	// 		inputData[$(this).attr(strAttr)] = $(this).val();
	// 	});
	// }
	// else {
	// 	$(objectX).find('input[' + attrValue + '], select[' + attrValue + '], textarea[' + attrValue + ']').each(function(){
	// 		inputData[$(this).attr(strAttr)] = $(this).val();
	// 	});
	// }
	$(objectX).find('input, select, textarea').each(function(){
		if (typeof ($(this).attr(strAttr)) != "undefined")
			inputData[$(this).attr(strAttr)] = $(this).val();
		// if ($(this).attr('type') == 'checkbox') {
		// 	if ($(this).context.checked) {
		// 		inputData[$(this).attr(strAttr)] = '1';
		// 	}
		// 	else {
		// 		inputData[$(this).attr(strAttr)] = '0';
		// 	}
		// }
		// else {
		// 	if (typeof ($(this).attr(strAttr)) != "undefined")
		// 		inputData[$(this).attr(strAttr)] = $(this).val();
		// }
	});
	
	return inputData;
}

function VALIDATE_DATA_INPUT(objectX, strAttr = 'id', isuccess, ifail){
	var iCheck = false;
	var err = "";
	$(objectX).find('input, select').each(function(){
		if(!$(this).prop('required')){
		} 
		else {
			if($(this).val() == "") {
				iCheck=true;
				switch ($(this).attr(strAttr)) {
					// case "CLASS_TYPE":
					// 	err+=("Chọn thiếu trường "+$(this).attr("placeholder")+" !\n");
					// 	break;
					default:
						err+=("Nhập thiếu trường "+$(this).attr("placeholder")+" !\n");
						break;
				}
			}
		}
	});
	if(!iCheck){ isuccess(); } 
	else { ifail(err); }
}

function CLEAR_ALL_DATA_INPUT(objectX) {
	$(objectX).find('input, textarea').each(function(){
		$(this).val("");
	});
}



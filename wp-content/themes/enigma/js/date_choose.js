jQuery(document).ready(function(){
		
	//register time picker evet
		jQuery.extend(jQuery.fn.pickadate.defaults,{
			monthsFull:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
			monthsShort:["一","二","三","四","五","六","七","八","九","十","十一","十二"],
			weekdaysFull:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			weekdaysShort:["日","一","二","三","四","五","六"],today:"今日",clear:"清空",firstDay:1,
			format:"yyyy-mm-dd",formatSubmit:"yyyy-mm-dd"});

		jQuery('.datepicker').pickadate({
			labelMonthNext: '下一月',
		    labelMonthPrev: '上一月',
		    labelMonthSelect: '选月份',
		    labelYearSelect: '选年份',
		    selectMonths: true,
		    selectYears: true,
			format:'yyyy-mm-dd',
			formatSubmit: 'yyyy-mm-dd',
		});
		jQuery('.timepicker').pickatime({
			format: 'HH:i',
			formatSubmit:  'HH:i',
			min: [8,30],
		    max: [21,0]
		});
});
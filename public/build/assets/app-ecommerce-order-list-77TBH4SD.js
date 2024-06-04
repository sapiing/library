$(function(){let l,i,c;isDarkStyle?(l=config.colors_dark.borderColor,i=config.colors_dark.bodyBg,c=config.colors_dark.headingColor):(l=config.colors.borderColor,i=config.colors.bodyBg,c=config.colors.headingColor);var m=$(".datatables-order"),f={1:{title:"Dispatched",class:"bg-label-warning"},2:{title:"Delivered",class:"bg-label-success"},3:{title:"Out for Delivery",class:"bg-label-primary"},4:{title:"Ready to Pickup",class:"bg-label-info"}},p={1:{title:"Paid",class:"text-success"},2:{title:"Pending",class:"text-warning"},3:{title:"Failed",class:"text-danger"},4:{title:"Cancelled",class:"text-secondary"}};if(m.length){var x=m.DataTable({ajax:assetsPath+"json/ecommerce-customer-order.json",columns:[{data:"id"},{data:"id"},{data:"order"},{data:"date"},{data:"customer"},{data:"payment"},{data:"status"},{data:"method"},{data:""}],columnDefs:[{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(a,o,r,s){return""}},{targets:1,orderable:!1,checkboxes:{selectAllRender:'<input type="checkbox" class="form-check-input">'},render:function(){return'<input type="checkbox" class="dt-checkboxes form-check-input" >'},searchable:!1},{targets:2,render:function(a,o,r,s){var e=r.order,n='<a href=" '+baseUrl+'app/ecommerce/order/details"><span>#'+e+"</span></a>";return n}},{targets:3,render:function(a,o,r,s){var e=new Date(r.date),n=r.time.substring(0,5),t=e.toLocaleDateString("en-US",{month:"short",day:"numeric",year:"numeric",time:"numeric"});return'<span class="text-nowrap">'+t+", "+n+"</span>"}},{targets:4,responsivePriority:1,render:function(a,o,r,s){var e=r.customer,n=r.email,t=r.avatar;if(t)var u='<img src="'+assetsPath+"img/avatars/"+t+'" alt="Avatar" class="rounded-circle">';else{var b=Math.floor(Math.random()*6),g=["success","danger","warning","info","dark","primary","secondary"],h=g[b],e=r.customer,d=e.match(/\b\w/g)||[];d=((d.shift()||"")+(d.pop()||"")).toUpperCase(),u='<span class="avatar-initial rounded-circle bg-label-'+h+'">'+d+"</span>"}var v='<div class="d-flex justify-content-start align-items-center order-name text-nowrap"><div class="avatar-wrapper"><div class="avatar me-2">'+u+'</div></div><div class="d-flex flex-column"><h6 class="m-0"><a href="'+baseUrl+'pages/profile-user" class="text-body">'+e+'</a></h6><small class="text-muted">'+n+"</small></div></div>";return v}},{targets:5,render:function(a,o,r,s){var e=r.payment,n=p[e];return n?'<h6 class="mb-0 align-items-center d-flex w-px-100 '+n.class+'"><i class="ti ti-circle-filled fs-tiny me-2"></i>'+n.title+"</h6>":a}},{targets:-3,render:function(a,o,r,s){var e=r.status;return'<span class="badge px-2 '+f[e].class+'" text-capitalized>'+f[e].title+"</span>"}},{targets:-2,render:function(a,o,r,s){var e=r.method,n=r.method_number;return e=="paypal_logo"&&(n="@gmail.com"),'<div class="d-flex align-items-center text-nowrap"><img src="'+assetsPath+"img/icons/payments/"+e+'.png" alt="'+e+'"class="me-2" width="16"><span><i class="ti ti-dots me-1 mt-n1"></i>'+n+"</span></div>"}},{targets:-1,title:"Actions",searchable:!1,orderable:!1,render:function(a,o,r,s){return'<div class="d-flex justify-content-sm-center align-items-sm-center"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href=" '+baseUrl+'app/ecommerce/order/details" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item delete-record">Delete</a></div></div>'}}],order:[3,"asc"],dom:'<"card-header pb-md-2 d-flex flex-column flex-md-row align-items-start align-items-md-center"<f><"d-flex align-items-md-center justify-content-md-end mt-2 mt-md-0 gap-2"l<"dt-action-buttons"B>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',lengthMenu:[10,40,60,80,100],language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Search Order",info:"Displaying _START_ to _END_ of _TOTAL_ entries"},buttons:[{extend:"collection",className:"btn btn-label-secondary dropdown-toggle waves-effect waves-light",text:'<i class="ti ti-download me-1"></i>Export',buttons:[{extend:"print",text:'<i class="ti ti-printer me-2"></i>Print',className:"dropdown-item",exportOptions:{columns:[2,3,4,5,6,7],format:{body:function(a,o,r){if(a.length<=0)return a;var s=$.parseHTML(a),e="";return $.each(s,function(n,t){t.classList!==void 0&&t.classList.contains("order-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}},customize:function(a){$(a.document.body).css("color",c).css("border-color",l).css("background-color",i),$(a.document.body).find("table").addClass("compact").css("color","inherit").css("border-color","inherit").css("background-color","inherit")}},{extend:"csv",text:'<i class="ti ti-file me-2"></i>Csv',className:"dropdown-item",exportOptions:{columns:[2,3,4,5,6,7],format:{body:function(a,o,r){if(a.length<=0)return a;var s=$.parseHTML(a),e="";return $.each(s,function(n,t){t.classList!==void 0&&t.classList.contains("order-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}},{extend:"excel",text:'<i class="ti ti-file-export me-2"></i>Excel',className:"dropdown-item",exportOptions:{columns:[2,3,4,5,6,7],format:{body:function(a,o,r){if(a.length<=0)return a;var s=$.parseHTML(a),e="";return $.each(s,function(n,t){t.classList!==void 0&&t.classList.contains("order-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}},{extend:"pdf",text:'<i class="ti ti-file-text me-2"></i>Pdf',className:"dropdown-item",exportOptions:{columns:[2,3,4,5,6,7],format:{body:function(a,o,r){if(a.length<=0)return a;var s=$.parseHTML(a),e="";return $.each(s,function(n,t){t.classList!==void 0&&t.classList.contains("order-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}},{extend:"copy",text:'<i class="ti ti-copy me-2"></i>Copy',className:"dropdown-item",exportOptions:{columns:[2,3,4,5,6,7],format:{body:function(a,o,r){if(a.length<=0)return a;var s=$.parseHTML(a),e="";return $.each(s,function(n,t){t.classList!==void 0&&t.classList.contains("order-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}}]}],responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(a){var o=a.data();return"Details of "+o.customer}}),type:"column",renderer:function(a,o,r){var s=$.map(r,function(e,n){return e.title!==""?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return s?$('<table class="table"/><tbody />').append(s):!1}}}});$(".dataTables_length").addClass("mt-0 mt-md-3 ms-n2"),$(".dt-action-buttons").addClass("pt-0"),$(".dataTables_filter").addClass("ms-n3")}$(".datatables-order tbody").on("click",".delete-record",function(){x.row($(this).parents("tr")).remove().draw()}),setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)});
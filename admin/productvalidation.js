  var selectcount=0;
  var productnamecount=0;
  var monthlypricecount=0;
  var annualpricecount=0;
  var skucount=0;
  var webspacecount=0;
  var bandwidthcount=0;
  var freedomaincount=0;
  var languagetechnologycount=0;
  var mailboxcount=0;

  $(document).ready(function() {
     $("#createcategory").prop('disabled', true);
});
  $('#selectid').focusout(function(){
     inputState();
});
  //select catagory
function inputState(){
          var value=($('#selectid').val()).trim();
          if (value=="Please select") {
            $("select").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            inputstatecount=0;
            return false;
          }
          else {
            $("select").removeClass("is-invalid");
            inputstatecount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        //by input product name
         $('#productname').focusout(function(){
         productName();
        });
        function productName(){
          var regproductname=/(^([a-zA-Z]+\s?)|([a-zA-Z]+\-[0-9]+$))|(^([a-zA-Z])+$)/;
          var value=($('#productname').val()).trim();
          if (value=="" || !(value.match(regproductname))) {
            $("#productname").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            productnamecount=0;
            return false;
          } else {
            $("#productname").removeClass("is-invalid");
            productnamecount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //monthly price
         $('#monthly').focusout(function(){
          monthlyPrice();
        });
        function monthlyPrice(){
          var regprice=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#monthly').val()).trim();
          if (value=="" || !(value.match(regprice)) || value.length>15) {
            $("#monthly").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            monthlypricecount=0;
            return false;
          }
          else {
            $("#monthly").removeClass("is-invalid");
            monthlypricecount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //anual price
        $('#anual').focusout(function(){
          annualPrice();
        });
        function annualPrice(){
          var regprice=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#anual').val()).trim();
          if (value=="" || !(value.match(regprice)) || value.length>15) {
            $("#anual").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            annualpricecount=0;
            return false;
          }
          else {
            $("#anual").removeClass("is-invalid");
            annualpricecount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //sku
         $('#sku').focusout(function(){
          sku();
        });
        function sku(){
          var regsku=/^(?![!@#$%^&*()_+=-`~?|]*$)[a-zA-Z0-9-#]+$/;
          var value=($('#sku').val()).trim();
          if (value=="" || !(value.match(regsku))) {
            $("#sku").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            skucount=0;
            return false;
          }
          else {
            $("#sku").removeClass("is-invalid");
            skucount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //web space

        $('#webspace').focusout(function(){
          webSpace();
        });
        function webSpace(){
          var regwebspace=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#webspace').val()).trim();
          if (value=="" || !(value.match(regwebspace)) || value.length>5) {
            $("#webspace").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            webspacecount=0;
            return false;
          }
          else {
            $("#webspace").removeClass("is-invalid");
            webspacecount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //bandwidth

        $('#bandwidth').focusout(function(){
          bandWidth();
        });
        function bandWidth(){
          var regbandwidth=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#bandwidth').val()).trim();
          if (value=="" || !(value.match(regbandwidth)) || value.length>5) {
            $("#bandwidth").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            bandwidthcount=0;
            return false;
          }
          else {
            $("#bandwidth").removeClass("is-invalid");
            bandwidthcount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //free domain
        $('#freedomain').focusout(function(){
          freeDomain();
        });
        function freeDomain(){
          var regfreedomain=/^([a-zA-Z]+$)|(^([0-9])+$)/;
          var value=($('#freedomain').val()).trim();
          if (value=="" || !(value.match(regfreedomain))) {
            $("#freedomain").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            freedomaincount=0;
            return false;
          }
          else {
            $("#freedomain").removeClass("is-invalid");
            freedomaincount=1;
            if (inputstatecount+productnamecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //TechnologyLanguage

        $('#technology').focusout(function(){
          technology();
        });
        function technology(){
          var reglanguagetech=/^((?![0-9]+$)[a-zA-Z0-9]+\,?\s?)+$/;
          var value=($('#technology').val()).trim();
          if (value=="" || !(value.match(reglanguagetech))) {
            $("#technology").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            languagetechnologycount=0;
            return false;
          }
          else {
            $("#technology").removeClass("is-invalid");
            languagetechnologycount=1;
            if (inputstatecount+productnamecount+monthlypricecount+annualpricecount+
            skucount+webspacecount+bandwidthcount+freedomaincount+
            languagetechnologycount+mailboxcount>=10) 
            {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        //mailbox

        $('#mailbox').focusout(function(){
         mailBox();
        });
        function mailBox(){
          var regmailbox=/^([0-9])+$/;
          var value=($('#mailbox').val()).trim();
          if (value=="" || !(value.match(regmailbox))) {
            $("#mailbox").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            mailboxcount=0;
            return false;
          }
          else {
            $("#mailbox").removeClass("is-invalid");
            mailboxcount=1;
            if (inputstatecount+productnamecount+monthlypricecount+annualpricecount+
            skucount+webspacecount+bandwidthcount+freedomaincount+
            languagetechnologycount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
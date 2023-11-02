function confirmDelete() {
    if(confirm('Are you sure you want to delete the item')) 
    {
        document.forms[0].submit();
    } else{
        //Do nothing if user cancels
    }
}
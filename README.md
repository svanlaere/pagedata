# pagedata
Store additional page data

Once you have enabled the pagedata plugin
it will add a new pagetab to all pages.

Its based on saving key value pairs:
the name field is your keyname and the value field is where you add your data.

Once you have (re)saved the page it will save the pagedata.

You can retrieve a single value by its given keyname:
<?php echo $this->pagedata->firstname; ?>
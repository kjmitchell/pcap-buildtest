<?php
$fileName = “DrawText.pdf”;
$qp = new COM(“DebenuPDFLibraryAX1212.PDFLibrary”);
$validKey = $qp->UnlockKey("jn8pt9er36o9gg8554aj6h34y");
if ($validKey == 1)
{
    echo “License validation successful!”;
    echo “<br />”;
    echo “Valid license key: “;
    echo $qp->LicenseInfo;
    echo “<br />”;
}
else
{
    echo “License validation failed!”;
    echo “<br /><br />”;
}
$qp->DrawText(100, 500, “Hello World!”);
$result = $qp->SaveToFile($fileName);
if ($result == 1)
{
    echo “File was successfully saved to disk.”;
    echo “<br /><br />”;
}
else
{
    echo “File could not be saved to disk.”;
    echo “<br /><br />”;
}
$qp = null;
?>
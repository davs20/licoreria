<?php
namespace Controllers;
interface accionControllers
{
    public function showAll();
    public function edit($data); /// se va a mandar como array
    public function show($id);
    public function disable($id);

} 
?>
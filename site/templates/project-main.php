<?php

//go($page->children()->visible()->first()); old, needs abstract "visible" and as first child

go($page->children()->find('abstract'));
<?php
class Sidebar_Link
{
    protected $name;
    protected $href;
    protected $is_active;
    protected $icon;

    function __construct($name, $href, $icon, $is_active = false)
    {
        $this->name = $name;
        $this->href = $href;
        $this->is_active = $is_active;
        $this->icon = $icon;
    }

    function render()
    {
        return '<a href="' . $this->href . '"' . ($this->is_active ? 'class="active"' : '') . '>
                    <i class="fa-solid ' . $this->icon . '"></i>
                    <span>' . $this->name . '</span>
                </a>';
    }
}
function render_side_bar($active_link = "")
{
    $links = array(
        new Sidebar_Link(name: "Home", href: $GLOBALS["store_path"], icon: "fa-house", is_active: $active_link === "Home"),
        new Sidebar_Link(name: "Stocks", href: $GLOBALS["store_path"] . '/stocks', icon: "fa-warehouse", is_active: $active_link === "Stocks"),
        new Sidebar_Link(name: "Orders", href: $GLOBALS["store_path"] . '/orders', icon: "fa-file-circle-check", is_active: $active_link === "Orders"),
        new Sidebar_Link(name: "Agents", href: $GLOBALS["store_path"] . '/agents', icon: "fa-user-group", is_active: $active_link === "Agents"),
        new Sidebar_Link(name: "Returned Goods", href: $GLOBALS["store_path"] . '/returned-goods', icon: "fa-user-group", is_active: $active_link === "Returned Goods"),
    );
    $links_text = '';
    foreach ($links as $link) {
        $links_text = $links_text . ' ' . $link->render();
    }

    echo '
        <header>
            <a href="/" class="logo">
                <img src="' . $GLOBALS["store_assets_path"] . '/logosales.png" alt="Sales Achieved Logo">
            </a>
            <nav class="tab-links">
            
                ' . $links_text . '
            </nav>
            <nav class="alt-links">
                <a href="">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Profile</span>
                </a>
                <a href="">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </header>
    ';
}

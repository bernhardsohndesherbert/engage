plugin.tx_engage {
    view {
        # cat=plugin.tx_engage/file; type=string; label=Path to template root
        templateRootPath = EXT:engage/Resources/Private/Templates/
        # cat=plugin.tx_engage/file; type=string; label=Path to template partials
        partialRootPath = EXT:engage/Resources/Private/Partials/
        # cat=plugin.tx_engage/file; type=string; label=Path to template layouts
        layoutRootPath = EXT:engage/Resources/Private/Layouts/
    }

    settings {
        # cat=plugin.tx_engage/file; type=string; label=Path to CSS file
        cssFile = EXT:engage/Resources/Public/Css/engage-commons.css
    }
}
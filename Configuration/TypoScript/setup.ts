# ==============================================
# Configuration for EXT:engage
# ==============================================
plugin.tx_engage {
    view {
        templateRootPaths {
            0 = EXT:engage/Resources/Private/Templates/
            1 = {$plugin.tx_engage.view.templateRootPath}
        }

        partialRootPaths {
            0 = EXT:engage/Resources/Private/Partials/
            1 = {$plugin.tx_engage.view.partialRootPath}
        }

        layoutRootPaths {
            0 = EXT:engage/Resources/Private/Layouts/
            1 = {$plugin.tx_engage.view.layoutRootPath}
        }

    }


    # ====================================
    # Plugin Settings
    # ====================================
    settings {
        cssFile = {$plugin.tx_engage.settings.cssFile}

    }
}

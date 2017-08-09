<?php
namespace Microsoft\Azure\Management\WebSites;
final class WebApps
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('WebApps_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('WebApps_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('WebApps_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('WebApps_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('WebApps_Delete');
        $this->_AnalyzeCustomHostname_operation = $_client->createOperation('WebApps_AnalyzeCustomHostname');
        $this->_ApplySlotConfigToProduction_operation = $_client->createOperation('WebApps_ApplySlotConfigToProduction');
        $this->_Backup_operation = $_client->createOperation('WebApps_Backup');
        $this->_ListBackups_operation = $_client->createOperation('WebApps_ListBackups');
        $this->_DiscoverRestore_operation = $_client->createOperation('WebApps_DiscoverRestore');
        $this->_GetBackupStatus_operation = $_client->createOperation('WebApps_GetBackupStatus');
        $this->_DeleteBackup_operation = $_client->createOperation('WebApps_DeleteBackup');
        $this->_ListBackupStatusSecrets_operation = $_client->createOperation('WebApps_ListBackupStatusSecrets');
        $this->_Restore_operation = $_client->createOperation('WebApps_Restore');
        $this->_ListConfigurations_operation = $_client->createOperation('WebApps_ListConfigurations');
        $this->_UpdateApplicationSettings_operation = $_client->createOperation('WebApps_UpdateApplicationSettings');
        $this->_ListApplicationSettings_operation = $_client->createOperation('WebApps_ListApplicationSettings');
        $this->_UpdateAuthSettings_operation = $_client->createOperation('WebApps_UpdateAuthSettings');
        $this->_GetAuthSettings_operation = $_client->createOperation('WebApps_GetAuthSettings');
        $this->_UpdateBackupConfiguration_operation = $_client->createOperation('WebApps_UpdateBackupConfiguration');
        $this->_DeleteBackupConfiguration_operation = $_client->createOperation('WebApps_DeleteBackupConfiguration');
        $this->_GetBackupConfiguration_operation = $_client->createOperation('WebApps_GetBackupConfiguration');
        $this->_UpdateConnectionStrings_operation = $_client->createOperation('WebApps_UpdateConnectionStrings');
        $this->_ListConnectionStrings_operation = $_client->createOperation('WebApps_ListConnectionStrings');
        $this->_GetDiagnosticLogsConfiguration_operation = $_client->createOperation('WebApps_GetDiagnosticLogsConfiguration');
        $this->_UpdateDiagnosticLogsConfig_operation = $_client->createOperation('WebApps_UpdateDiagnosticLogsConfig');
        $this->_UpdateMetadata_operation = $_client->createOperation('WebApps_UpdateMetadata');
        $this->_ListMetadata_operation = $_client->createOperation('WebApps_ListMetadata');
        $this->_ListPublishingCredentials_operation = $_client->createOperation('WebApps_ListPublishingCredentials');
        $this->_UpdateSitePushSettings_operation = $_client->createOperation('WebApps_UpdateSitePushSettings');
        $this->_ListSitePushSettings_operation = $_client->createOperation('WebApps_ListSitePushSettings');
        $this->_ListSlotConfigurationNames_operation = $_client->createOperation('WebApps_ListSlotConfigurationNames');
        $this->_UpdateSlotConfigurationNames_operation = $_client->createOperation('WebApps_UpdateSlotConfigurationNames');
        $this->_GetConfiguration_operation = $_client->createOperation('WebApps_GetConfiguration');
        $this->_CreateOrUpdateConfiguration_operation = $_client->createOperation('WebApps_CreateOrUpdateConfiguration');
        $this->_UpdateConfiguration_operation = $_client->createOperation('WebApps_UpdateConfiguration');
        $this->_ListConfigurationSnapshotInfo_operation = $_client->createOperation('WebApps_ListConfigurationSnapshotInfo');
        $this->_GetConfigurationSnapshot_operation = $_client->createOperation('WebApps_GetConfigurationSnapshot');
        $this->_RecoverSiteConfigurationSnapshot_operation = $_client->createOperation('WebApps_RecoverSiteConfigurationSnapshot');
        $this->_ListDeployments_operation = $_client->createOperation('WebApps_ListDeployments');
        $this->_GetDeployment_operation = $_client->createOperation('WebApps_GetDeployment');
        $this->_CreateDeployment_operation = $_client->createOperation('WebApps_CreateDeployment');
        $this->_DeleteDeployment_operation = $_client->createOperation('WebApps_DeleteDeployment');
        $this->_ListDomainOwnershipIdentifiers_operation = $_client->createOperation('WebApps_ListDomainOwnershipIdentifiers');
        $this->_GetDomainOwnershipIdentifier_operation = $_client->createOperation('WebApps_GetDomainOwnershipIdentifier');
        $this->_CreateOrUpdateDomainOwnershipIdentifier_operation = $_client->createOperation('WebApps_CreateOrUpdateDomainOwnershipIdentifier');
        $this->_DeleteDomainOwnershipIdentifier_operation = $_client->createOperation('WebApps_DeleteDomainOwnershipIdentifier');
        $this->_UpdateDomainOwnershipIdentifier_operation = $_client->createOperation('WebApps_UpdateDomainOwnershipIdentifier');
        $this->_GetMSDeployStatus_operation = $_client->createOperation('WebApps_GetMSDeployStatus');
        $this->_CreateMSDeployOperation_operation = $_client->createOperation('WebApps_CreateMSDeployOperation');
        $this->_GetMSDeployLog_operation = $_client->createOperation('WebApps_GetMSDeployLog');
        $this->_GetFunctionsAdminToken_operation = $_client->createOperation('WebApps_GetFunctionsAdminToken');
        $this->_ListHostNameBindings_operation = $_client->createOperation('WebApps_ListHostNameBindings');
        $this->_GetHostNameBinding_operation = $_client->createOperation('WebApps_GetHostNameBinding');
        $this->_CreateOrUpdateHostNameBinding_operation = $_client->createOperation('WebApps_CreateOrUpdateHostNameBinding');
        $this->_DeleteHostNameBinding_operation = $_client->createOperation('WebApps_DeleteHostNameBinding');
        $this->_GetHybridConnection_operation = $_client->createOperation('WebApps_GetHybridConnection');
        $this->_CreateOrUpdateHybridConnection_operation = $_client->createOperation('WebApps_CreateOrUpdateHybridConnection');
        $this->_DeleteHybridConnection_operation = $_client->createOperation('WebApps_DeleteHybridConnection');
        $this->_UpdateHybridConnection_operation = $_client->createOperation('WebApps_UpdateHybridConnection');
        $this->_ListHybridConnectionKeys_operation = $_client->createOperation('WebApps_ListHybridConnectionKeys');
        $this->_ListHybridConnections_operation = $_client->createOperation('WebApps_ListHybridConnections');
        $this->_ListRelayServiceConnections_operation = $_client->createOperation('WebApps_ListRelayServiceConnections');
        $this->_GetRelayServiceConnection_operation = $_client->createOperation('WebApps_GetRelayServiceConnection');
        $this->_CreateOrUpdateRelayServiceConnection_operation = $_client->createOperation('WebApps_CreateOrUpdateRelayServiceConnection');
        $this->_DeleteRelayServiceConnection_operation = $_client->createOperation('WebApps_DeleteRelayServiceConnection');
        $this->_UpdateRelayServiceConnection_operation = $_client->createOperation('WebApps_UpdateRelayServiceConnection');
        $this->_ListInstanceIdentifiers_operation = $_client->createOperation('WebApps_ListInstanceIdentifiers');
        $this->_ListInstanceDeployments_operation = $_client->createOperation('WebApps_ListInstanceDeployments');
        $this->_GetInstanceDeployment_operation = $_client->createOperation('WebApps_GetInstanceDeployment');
        $this->_CreateInstanceDeployment_operation = $_client->createOperation('WebApps_CreateInstanceDeployment');
        $this->_DeleteInstanceDeployment_operation = $_client->createOperation('WebApps_DeleteInstanceDeployment');
        $this->_GetInstanceMsDeployStatus_operation = $_client->createOperation('WebApps_GetInstanceMsDeployStatus');
        $this->_CreateInstanceMSDeployOperation_operation = $_client->createOperation('WebApps_CreateInstanceMSDeployOperation');
        $this->_GetInstanceMSDeployLog_operation = $_client->createOperation('WebApps_GetInstanceMSDeployLog');
        $this->_IsCloneable_operation = $_client->createOperation('WebApps_IsCloneable');
        $this->_ListMetricDefinitions_operation = $_client->createOperation('WebApps_ListMetricDefinitions');
        $this->_ListMetrics_operation = $_client->createOperation('WebApps_ListMetrics');
        $this->_MigrateStorage_operation = $_client->createOperation('WebApps_MigrateStorage');
        $this->_MigrateMySql_operation = $_client->createOperation('WebApps_MigrateMySql');
        $this->_GetMigrateMySqlStatus_operation = $_client->createOperation('WebApps_GetMigrateMySqlStatus');
        $this->_ListNetworkFeatures_operation = $_client->createOperation('WebApps_ListNetworkFeatures');
        $this->_StartWebSiteNetworkTrace_operation = $_client->createOperation('WebApps_StartWebSiteNetworkTrace');
        $this->_StopWebSiteNetworkTrace_operation = $_client->createOperation('WebApps_StopWebSiteNetworkTrace');
        $this->_GenerateNewSitePublishingPassword_operation = $_client->createOperation('WebApps_GenerateNewSitePublishingPassword');
        $this->_ListPerfMonCounters_operation = $_client->createOperation('WebApps_ListPerfMonCounters');
        $this->_GetSitePhpErrorLogFlag_operation = $_client->createOperation('WebApps_GetSitePhpErrorLogFlag');
        $this->_ListPremierAddOns_operation = $_client->createOperation('WebApps_ListPremierAddOns');
        $this->_GetPremierAddOn_operation = $_client->createOperation('WebApps_GetPremierAddOn');
        $this->_AddPremierAddOn_operation = $_client->createOperation('WebApps_AddPremierAddOn');
        $this->_DeletePremierAddOn_operation = $_client->createOperation('WebApps_DeletePremierAddOn');
        $this->_ListPublicCertificates_operation = $_client->createOperation('WebApps_ListPublicCertificates');
        $this->_GetPublicCertificate_operation = $_client->createOperation('WebApps_GetPublicCertificate');
        $this->_CreateOrUpdatePublicCertificate_operation = $_client->createOperation('WebApps_CreateOrUpdatePublicCertificate');
        $this->_DeletePublicCertificate_operation = $_client->createOperation('WebApps_DeletePublicCertificate');
        $this->_ListPublishingProfileXmlWithSecrets_operation = $_client->createOperation('WebApps_ListPublishingProfileXmlWithSecrets');
        $this->_Recover_operation = $_client->createOperation('WebApps_Recover');
        $this->_ResetProductionSlotConfig_operation = $_client->createOperation('WebApps_ResetProductionSlotConfig');
        $this->_Restart_operation = $_client->createOperation('WebApps_Restart');
        $this->_ListSlots_operation = $_client->createOperation('WebApps_ListSlots');
        $this->_GetSlot_operation = $_client->createOperation('WebApps_GetSlot');
        $this->_CreateOrUpdateSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateSlot');
        $this->_DeleteSlot_operation = $_client->createOperation('WebApps_DeleteSlot');
        $this->_AnalyzeCustomHostnameSlot_operation = $_client->createOperation('WebApps_AnalyzeCustomHostnameSlot');
        $this->_ApplySlotConfigurationSlot_operation = $_client->createOperation('WebApps_ApplySlotConfigurationSlot');
        $this->_BackupSlot_operation = $_client->createOperation('WebApps_BackupSlot');
        $this->_ListBackupsSlot_operation = $_client->createOperation('WebApps_ListBackupsSlot');
        $this->_DiscoverRestoreSlot_operation = $_client->createOperation('WebApps_DiscoverRestoreSlot');
        $this->_GetBackupStatusSlot_operation = $_client->createOperation('WebApps_GetBackupStatusSlot');
        $this->_DeleteBackupSlot_operation = $_client->createOperation('WebApps_DeleteBackupSlot');
        $this->_ListBackupStatusSecretsSlot_operation = $_client->createOperation('WebApps_ListBackupStatusSecretsSlot');
        $this->_RestoreSlot_operation = $_client->createOperation('WebApps_RestoreSlot');
        $this->_ListConfigurationsSlot_operation = $_client->createOperation('WebApps_ListConfigurationsSlot');
        $this->_UpdateApplicationSettingsSlot_operation = $_client->createOperation('WebApps_UpdateApplicationSettingsSlot');
        $this->_ListApplicationSettingsSlot_operation = $_client->createOperation('WebApps_ListApplicationSettingsSlot');
        $this->_UpdateAuthSettingsSlot_operation = $_client->createOperation('WebApps_UpdateAuthSettingsSlot');
        $this->_GetAuthSettingsSlot_operation = $_client->createOperation('WebApps_GetAuthSettingsSlot');
        $this->_UpdateBackupConfigurationSlot_operation = $_client->createOperation('WebApps_UpdateBackupConfigurationSlot');
        $this->_DeleteBackupConfigurationSlot_operation = $_client->createOperation('WebApps_DeleteBackupConfigurationSlot');
        $this->_GetBackupConfigurationSlot_operation = $_client->createOperation('WebApps_GetBackupConfigurationSlot');
        $this->_UpdateConnectionStringsSlot_operation = $_client->createOperation('WebApps_UpdateConnectionStringsSlot');
        $this->_ListConnectionStringsSlot_operation = $_client->createOperation('WebApps_ListConnectionStringsSlot');
        $this->_GetDiagnosticLogsConfigurationSlot_operation = $_client->createOperation('WebApps_GetDiagnosticLogsConfigurationSlot');
        $this->_UpdateDiagnosticLogsConfigSlot_operation = $_client->createOperation('WebApps_UpdateDiagnosticLogsConfigSlot');
        $this->_UpdateMetadataSlot_operation = $_client->createOperation('WebApps_UpdateMetadataSlot');
        $this->_ListMetadataSlot_operation = $_client->createOperation('WebApps_ListMetadataSlot');
        $this->_ListPublishingCredentialsSlot_operation = $_client->createOperation('WebApps_ListPublishingCredentialsSlot');
        $this->_UpdateSitePushSettingsSlot_operation = $_client->createOperation('WebApps_UpdateSitePushSettingsSlot');
        $this->_ListSitePushSettingsSlot_operation = $_client->createOperation('WebApps_ListSitePushSettingsSlot');
        $this->_GetConfigurationSlot_operation = $_client->createOperation('WebApps_GetConfigurationSlot');
        $this->_CreateOrUpdateConfigurationSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateConfigurationSlot');
        $this->_UpdateConfigurationSlot_operation = $_client->createOperation('WebApps_UpdateConfigurationSlot');
        $this->_ListConfigurationSnapshotInfoSlot_operation = $_client->createOperation('WebApps_ListConfigurationSnapshotInfoSlot');
        $this->_GetConfigurationSnapshotSlot_operation = $_client->createOperation('WebApps_GetConfigurationSnapshotSlot');
        $this->_RecoverSiteConfigurationSnapshotSlot_operation = $_client->createOperation('WebApps_RecoverSiteConfigurationSnapshotSlot');
        $this->_ListDeploymentsSlot_operation = $_client->createOperation('WebApps_ListDeploymentsSlot');
        $this->_GetDeploymentSlot_operation = $_client->createOperation('WebApps_GetDeploymentSlot');
        $this->_CreateDeploymentSlot_operation = $_client->createOperation('WebApps_CreateDeploymentSlot');
        $this->_DeleteDeploymentSlot_operation = $_client->createOperation('WebApps_DeleteDeploymentSlot');
        $this->_ListDomainOwnershipIdentifiersSlot_operation = $_client->createOperation('WebApps_ListDomainOwnershipIdentifiersSlot');
        $this->_GetDomainOwnershipIdentifierSlot_operation = $_client->createOperation('WebApps_GetDomainOwnershipIdentifierSlot');
        $this->_CreateOrUpdateDomainOwnershipIdentifierSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateDomainOwnershipIdentifierSlot');
        $this->_DeleteDomainOwnershipIdentifierSlot_operation = $_client->createOperation('WebApps_DeleteDomainOwnershipIdentifierSlot');
        $this->_UpdateDomainOwnershipIdentifierSlot_operation = $_client->createOperation('WebApps_UpdateDomainOwnershipIdentifierSlot');
        $this->_GetMSDeployStatusSlot_operation = $_client->createOperation('WebApps_GetMSDeployStatusSlot');
        $this->_CreateMSDeployOperationSlot_operation = $_client->createOperation('WebApps_CreateMSDeployOperationSlot');
        $this->_GetMSDeployLogSlot_operation = $_client->createOperation('WebApps_GetMSDeployLogSlot');
        $this->_GetFunctionsAdminTokenSlot_operation = $_client->createOperation('WebApps_GetFunctionsAdminTokenSlot');
        $this->_ListHostNameBindingsSlot_operation = $_client->createOperation('WebApps_ListHostNameBindingsSlot');
        $this->_GetHostNameBindingSlot_operation = $_client->createOperation('WebApps_GetHostNameBindingSlot');
        $this->_CreateOrUpdateHostNameBindingSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateHostNameBindingSlot');
        $this->_DeleteHostNameBindingSlot_operation = $_client->createOperation('WebApps_DeleteHostNameBindingSlot');
        $this->_GetHybridConnectionSlot_operation = $_client->createOperation('WebApps_GetHybridConnectionSlot');
        $this->_CreateOrUpdateHybridConnectionSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateHybridConnectionSlot');
        $this->_DeleteHybridConnectionSlot_operation = $_client->createOperation('WebApps_DeleteHybridConnectionSlot');
        $this->_UpdateHybridConnectionSlot_operation = $_client->createOperation('WebApps_UpdateHybridConnectionSlot');
        $this->_ListHybridConnectionKeysSlot_operation = $_client->createOperation('WebApps_ListHybridConnectionKeysSlot');
        $this->_ListHybridConnectionsSlot_operation = $_client->createOperation('WebApps_ListHybridConnectionsSlot');
        $this->_ListRelayServiceConnectionsSlot_operation = $_client->createOperation('WebApps_ListRelayServiceConnectionsSlot');
        $this->_GetRelayServiceConnectionSlot_operation = $_client->createOperation('WebApps_GetRelayServiceConnectionSlot');
        $this->_CreateOrUpdateRelayServiceConnectionSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateRelayServiceConnectionSlot');
        $this->_DeleteRelayServiceConnectionSlot_operation = $_client->createOperation('WebApps_DeleteRelayServiceConnectionSlot');
        $this->_UpdateRelayServiceConnectionSlot_operation = $_client->createOperation('WebApps_UpdateRelayServiceConnectionSlot');
        $this->_ListInstanceIdentifiersSlot_operation = $_client->createOperation('WebApps_ListInstanceIdentifiersSlot');
        $this->_ListInstanceDeploymentsSlot_operation = $_client->createOperation('WebApps_ListInstanceDeploymentsSlot');
        $this->_GetInstanceDeploymentSlot_operation = $_client->createOperation('WebApps_GetInstanceDeploymentSlot');
        $this->_CreateInstanceDeploymentSlot_operation = $_client->createOperation('WebApps_CreateInstanceDeploymentSlot');
        $this->_DeleteInstanceDeploymentSlot_operation = $_client->createOperation('WebApps_DeleteInstanceDeploymentSlot');
        $this->_GetInstanceMsDeployStatusSlot_operation = $_client->createOperation('WebApps_GetInstanceMsDeployStatusSlot');
        $this->_CreateInstanceMSDeployOperationSlot_operation = $_client->createOperation('WebApps_CreateInstanceMSDeployOperationSlot');
        $this->_GetInstanceMSDeployLogSlot_operation = $_client->createOperation('WebApps_GetInstanceMSDeployLogSlot');
        $this->_IsCloneableSlot_operation = $_client->createOperation('WebApps_IsCloneableSlot');
        $this->_ListMetricDefinitionsSlot_operation = $_client->createOperation('WebApps_ListMetricDefinitionsSlot');
        $this->_ListMetricsSlot_operation = $_client->createOperation('WebApps_ListMetricsSlot');
        $this->_GetMigrateMySqlStatusSlot_operation = $_client->createOperation('WebApps_GetMigrateMySqlStatusSlot');
        $this->_ListNetworkFeaturesSlot_operation = $_client->createOperation('WebApps_ListNetworkFeaturesSlot');
        $this->_StartWebSiteNetworkTraceSlot_operation = $_client->createOperation('WebApps_StartWebSiteNetworkTraceSlot');
        $this->_StopWebSiteNetworkTraceSlot_operation = $_client->createOperation('WebApps_StopWebSiteNetworkTraceSlot');
        $this->_GenerateNewSitePublishingPasswordSlot_operation = $_client->createOperation('WebApps_GenerateNewSitePublishingPasswordSlot');
        $this->_ListPerfMonCountersSlot_operation = $_client->createOperation('WebApps_ListPerfMonCountersSlot');
        $this->_GetSitePhpErrorLogFlagSlot_operation = $_client->createOperation('WebApps_GetSitePhpErrorLogFlagSlot');
        $this->_ListPremierAddOnsSlot_operation = $_client->createOperation('WebApps_ListPremierAddOnsSlot');
        $this->_GetPremierAddOnSlot_operation = $_client->createOperation('WebApps_GetPremierAddOnSlot');
        $this->_AddPremierAddOnSlot_operation = $_client->createOperation('WebApps_AddPremierAddOnSlot');
        $this->_DeletePremierAddOnSlot_operation = $_client->createOperation('WebApps_DeletePremierAddOnSlot');
        $this->_ListPublicCertificatesSlot_operation = $_client->createOperation('WebApps_ListPublicCertificatesSlot');
        $this->_GetPublicCertificateSlot_operation = $_client->createOperation('WebApps_GetPublicCertificateSlot');
        $this->_CreateOrUpdatePublicCertificateSlot_operation = $_client->createOperation('WebApps_CreateOrUpdatePublicCertificateSlot');
        $this->_DeletePublicCertificateSlot_operation = $_client->createOperation('WebApps_DeletePublicCertificateSlot');
        $this->_ListPublishingProfileXmlWithSecretsSlot_operation = $_client->createOperation('WebApps_ListPublishingProfileXmlWithSecretsSlot');
        $this->_RecoverSlot_operation = $_client->createOperation('WebApps_RecoverSlot');
        $this->_ResetSlotConfigurationSlot_operation = $_client->createOperation('WebApps_ResetSlotConfigurationSlot');
        $this->_RestartSlot_operation = $_client->createOperation('WebApps_RestartSlot');
        $this->_ListSlotDifferencesSlot_operation = $_client->createOperation('WebApps_ListSlotDifferencesSlot');
        $this->_SwapSlotSlot_operation = $_client->createOperation('WebApps_SwapSlotSlot');
        $this->_ListSnapshotsSlot_operation = $_client->createOperation('WebApps_ListSnapshotsSlot');
        $this->_GetSourceControlSlot_operation = $_client->createOperation('WebApps_GetSourceControlSlot');
        $this->_CreateOrUpdateSourceControlSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateSourceControlSlot');
        $this->_DeleteSourceControlSlot_operation = $_client->createOperation('WebApps_DeleteSourceControlSlot');
        $this->_StartSlot_operation = $_client->createOperation('WebApps_StartSlot');
        $this->_StopSlot_operation = $_client->createOperation('WebApps_StopSlot');
        $this->_SyncRepositorySlot_operation = $_client->createOperation('WebApps_SyncRepositorySlot');
        $this->_SyncFunctionTriggersSlot_operation = $_client->createOperation('WebApps_SyncFunctionTriggersSlot');
        $this->_ListUsagesSlot_operation = $_client->createOperation('WebApps_ListUsagesSlot');
        $this->_ListVnetConnectionsSlot_operation = $_client->createOperation('WebApps_ListVnetConnectionsSlot');
        $this->_GetVnetConnectionSlot_operation = $_client->createOperation('WebApps_GetVnetConnectionSlot');
        $this->_CreateOrUpdateVnetConnectionSlot_operation = $_client->createOperation('WebApps_CreateOrUpdateVnetConnectionSlot');
        $this->_DeleteVnetConnectionSlot_operation = $_client->createOperation('WebApps_DeleteVnetConnectionSlot');
        $this->_UpdateVnetConnectionSlot_operation = $_client->createOperation('WebApps_UpdateVnetConnectionSlot');
        $this->_GetVnetConnectionGatewaySlot_operation = $_client->createOperation('WebApps_GetVnetConnectionGatewaySlot');
        $this->_CreateOrUpdateVnetConnectionGatewaySlot_operation = $_client->createOperation('WebApps_CreateOrUpdateVnetConnectionGatewaySlot');
        $this->_UpdateVnetConnectionGatewaySlot_operation = $_client->createOperation('WebApps_UpdateVnetConnectionGatewaySlot');
        $this->_ListSlotDifferencesFromProduction_operation = $_client->createOperation('WebApps_ListSlotDifferencesFromProduction');
        $this->_SwapSlotWithProduction_operation = $_client->createOperation('WebApps_SwapSlotWithProduction');
        $this->_ListSnapshots_operation = $_client->createOperation('WebApps_ListSnapshots');
        $this->_GetSourceControl_operation = $_client->createOperation('WebApps_GetSourceControl');
        $this->_CreateOrUpdateSourceControl_operation = $_client->createOperation('WebApps_CreateOrUpdateSourceControl');
        $this->_DeleteSourceControl_operation = $_client->createOperation('WebApps_DeleteSourceControl');
        $this->_Start_operation = $_client->createOperation('WebApps_Start');
        $this->_Stop_operation = $_client->createOperation('WebApps_Stop');
        $this->_SyncRepository_operation = $_client->createOperation('WebApps_SyncRepository');
        $this->_SyncFunctionTriggers_operation = $_client->createOperation('WebApps_SyncFunctionTriggers');
        $this->_ListUsages_operation = $_client->createOperation('WebApps_ListUsages');
        $this->_ListVnetConnections_operation = $_client->createOperation('WebApps_ListVnetConnections');
        $this->_GetVnetConnection_operation = $_client->createOperation('WebApps_GetVnetConnection');
        $this->_CreateOrUpdateVnetConnection_operation = $_client->createOperation('WebApps_CreateOrUpdateVnetConnection');
        $this->_DeleteVnetConnection_operation = $_client->createOperation('WebApps_DeleteVnetConnection');
        $this->_UpdateVnetConnection_operation = $_client->createOperation('WebApps_UpdateVnetConnection');
        $this->_GetVnetConnectionGateway_operation = $_client->createOperation('WebApps_GetVnetConnectionGateway');
        $this->_CreateOrUpdateVnetConnectionGateway_operation = $_client->createOperation('WebApps_CreateOrUpdateVnetConnectionGateway');
        $this->_UpdateVnetConnectionGateway_operation = $_client->createOperation('WebApps_UpdateVnetConnectionGateway');
    }
    /**
     * Get all apps for a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Gets all web, mobile, and API apps in the specified resource group.
     * @param string $resourceGroupName
     * @param boolean|null $includeSlots
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $includeSlots = null
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'includeSlots' => $includeSlots
        ]);
    }
    /**
     * Gets the details of a web, mobile, or API app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Creates a new web, mobile, or API app in an existing resource group, or updates an existing app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteEnvelope
     * @param boolean|null $skipDnsRegistration
     * @param boolean|null $skipCustomDomainVerification
     * @param boolean|null $forceDnsRegistration
     * @param string|null $ttlInSeconds
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $name,
        array $siteEnvelope,
        $skipDnsRegistration = null,
        $skipCustomDomainVerification = null,
        $forceDnsRegistration = null,
        $ttlInSeconds = null
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteEnvelope' => $siteEnvelope,
            'skipDnsRegistration' => $skipDnsRegistration,
            'skipCustomDomainVerification' => $skipCustomDomainVerification,
            'forceDnsRegistration' => $forceDnsRegistration,
            'ttlInSeconds' => $ttlInSeconds
        ]);
    }
    /**
     * Deletes a web, mobile, or API app, or one of the deployment slots.
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean|null $deleteMetrics
     * @param boolean|null $deleteEmptyServerFarm
     * @param boolean|null $skipDnsRegistration
     */
    public function delete(
        $resourceGroupName,
        $name,
        $deleteMetrics = null,
        $deleteEmptyServerFarm = null,
        $skipDnsRegistration = null
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'deleteMetrics' => $deleteMetrics,
            'deleteEmptyServerFarm' => $deleteEmptyServerFarm,
            'skipDnsRegistration' => $skipDnsRegistration
        ]);
    }
    /**
     * Analyze a custom hostname.
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $hostName
     * @return array
     */
    public function analyzeCustomHostname(
        $resourceGroupName,
        $name,
        $hostName = null
    )
    {
        return $this->_AnalyzeCustomHostname_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'hostName' => $hostName
        ]);
    }
    /**
     * Applies the configuration settings from the target slot onto the current slot.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotSwapEntity
     */
    public function applySlotConfigToProduction(
        $resourceGroupName,
        $name,
        array $slotSwapEntity
    )
    {
        return $this->_ApplySlotConfigToProduction_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotSwapEntity' => $slotSwapEntity
        ]);
    }
    /**
     * Creates a backup of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $request
     * @return array
     */
    public function backup(
        $resourceGroupName,
        $name,
        array $request
    )
    {
        return $this->_Backup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'request' => $request
        ]);
    }
    /**
     * Gets existing backups of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listBackups(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListBackups_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Discovers an existing app backup that can be restored from a blob in Azure storage.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $request
     * @return array
     */
    public function discoverRestore(
        $resourceGroupName,
        $name,
        array $request
    )
    {
        return $this->_DiscoverRestore_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'request' => $request
        ]);
    }
    /**
     * Gets a backup of an app by its ID.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @return array
     */
    public function getBackupStatus(
        $resourceGroupName,
        $name,
        $backupId
    )
    {
        return $this->_GetBackupStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId
        ]);
    }
    /**
     * Deletes a backup of an app by its ID.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     */
    public function deleteBackup(
        $resourceGroupName,
        $name,
        $backupId
    )
    {
        return $this->_DeleteBackup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId
        ]);
    }
    /**
     * Gets status of a web app backup that may be in progress, including secrets associated with the backup, such as the Azure Storage SAS URL. Also can be used to update the SAS URL for the backup if a new URL is passed in the request body.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @param array $request
     * @return array
     */
    public function listBackupStatusSecrets(
        $resourceGroupName,
        $name,
        $backupId,
        array $request
    )
    {
        return $this->_ListBackupStatusSecrets_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId,
            'request' => $request
        ]);
    }
    /**
     * Restores a specific backup to another app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @param array $request
     * @return array
     */
    public function restore(
        $resourceGroupName,
        $name,
        $backupId,
        array $request
    )
    {
        return $this->_Restore_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId,
            'request' => $request
        ]);
    }
    /**
     * List the configurations of an app
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listConfigurations(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListConfigurations_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Replaces the application settings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $appSettings
     * @return array
     */
    public function updateApplicationSettings(
        $resourceGroupName,
        $name,
        array $appSettings
    )
    {
        return $this->_UpdateApplicationSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'appSettings' => $appSettings
        ]);
    }
    /**
     * Gets the application settings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listApplicationSettings(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListApplicationSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the Authentication / Authorization settings associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteAuthSettings
     * @return array
     */
    public function updateAuthSettings(
        $resourceGroupName,
        $name,
        array $siteAuthSettings
    )
    {
        return $this->_UpdateAuthSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteAuthSettings' => $siteAuthSettings
        ]);
    }
    /**
     * Gets the Authentication/Authorization settings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getAuthSettings(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetAuthSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the backup configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $request
     * @return array
     */
    public function updateBackupConfiguration(
        $resourceGroupName,
        $name,
        array $request
    )
    {
        return $this->_UpdateBackupConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'request' => $request
        ]);
    }
    /**
     * Deletes the backup configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function deleteBackupConfiguration(
        $resourceGroupName,
        $name
    )
    {
        return $this->_DeleteBackupConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the backup configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getBackupConfiguration(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetBackupConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Replaces the connection strings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $connectionStrings
     * @return array
     */
    public function updateConnectionStrings(
        $resourceGroupName,
        $name,
        array $connectionStrings
    )
    {
        return $this->_UpdateConnectionStrings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'connectionStrings' => $connectionStrings
        ]);
    }
    /**
     * Gets the connection strings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listConnectionStrings(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListConnectionStrings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the logging configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getDiagnosticLogsConfiguration(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetDiagnosticLogsConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the logging configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteLogsConfig
     * @return array
     */
    public function updateDiagnosticLogsConfig(
        $resourceGroupName,
        $name,
        array $siteLogsConfig
    )
    {
        return $this->_UpdateDiagnosticLogsConfig_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteLogsConfig' => $siteLogsConfig
        ]);
    }
    /**
     * Replaces the metadata of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $metadata
     * @return array
     */
    public function updateMetadata(
        $resourceGroupName,
        $name,
        array $metadata
    )
    {
        return $this->_UpdateMetadata_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'metadata' => $metadata
        ]);
    }
    /**
     * Gets the metadata of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMetadata(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMetadata_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the Git/FTP publishing credentials of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listPublishingCredentials(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListPublishingCredentials_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the Push settings associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $pushSettings
     * @return array
     */
    public function updateSitePushSettings(
        $resourceGroupName,
        $name,
        array $pushSettings
    )
    {
        return $this->_UpdateSitePushSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'pushSettings' => $pushSettings
        ]);
    }
    /**
     * Gets the Push settings associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listSitePushSettings(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListSitePushSettings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the names of app settings and connection strings that stick to the slot (not swapped).
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listSlotConfigurationNames(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListSlotConfigurationNames_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the names of application settings and connection string that remain with the slot during swap operation.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotConfigNames
     * @return array
     */
    public function updateSlotConfigurationNames(
        $resourceGroupName,
        $name,
        array $slotConfigNames
    )
    {
        return $this->_UpdateSlotConfigurationNames_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotConfigNames' => $slotConfigNames
        ]);
    }
    /**
     * Gets the configuration of an app, such as platform version and bitness, default documents, virtual applications, Always On, etc.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getConfiguration(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteConfig
     * @return array
     */
    public function createOrUpdateConfiguration(
        $resourceGroupName,
        $name,
        array $siteConfig
    )
    {
        return $this->_CreateOrUpdateConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteConfig' => $siteConfig
        ]);
    }
    /**
     * Updates the configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteConfig
     * @return array
     */
    public function updateConfiguration(
        $resourceGroupName,
        $name,
        array $siteConfig
    )
    {
        return $this->_UpdateConfiguration_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteConfig' => $siteConfig
        ]);
    }
    /**
     * Gets a list of web app configuration snapshots identifiers. Each element of the list contains a timestamp and the ID of the snapshot.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function listConfigurationSnapshotInfo(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListConfigurationSnapshotInfo_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets a snapshot of the configuration of an app at a previous point in time.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $snapshotId
     * @return array
     */
    public function getConfigurationSnapshot(
        $resourceGroupName,
        $name,
        $snapshotId
    )
    {
        return $this->_GetConfigurationSnapshot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'snapshotId' => $snapshotId
        ]);
    }
    /**
     * Reverts the configuration of an app to a previous snapshot.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $snapshotId
     */
    public function recoverSiteConfigurationSnapshot(
        $resourceGroupName,
        $name,
        $snapshotId
    )
    {
        return $this->_RecoverSiteConfigurationSnapshot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'snapshotId' => $snapshotId
        ]);
    }
    /**
     * List deployments for an app, or a deployment slot, or for an instance of a scaled-out app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listDeployments(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListDeployments_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @return array
     */
    public function getDeployment(
        $resourceGroupName,
        $name,
        $id
    )
    {
        return $this->_GetDeployment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id
        ]);
    }
    /**
     * Create a deployment for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param array $deployment
     * @return array
     */
    public function createDeployment(
        $resourceGroupName,
        $name,
        $id,
        array $deployment
    )
    {
        return $this->_CreateDeployment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'deployment' => $deployment
        ]);
    }
    /**
     * Delete a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     */
    public function deleteDeployment(
        $resourceGroupName,
        $name,
        $id
    )
    {
        return $this->_DeleteDeployment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id
        ]);
    }
    /**
     * Lists ownership identifiers for domain associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listDomainOwnershipIdentifiers(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListDomainOwnershipIdentifiers_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get domain ownership identifier for web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @return array
     */
    public function getDomainOwnershipIdentifier(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName
    )
    {
        return $this->_GetDomainOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName
        ]);
    }
    /**
     * Creates a domain ownership identifier for web app, or updates an existing ownership identifier.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @param array $domainOwnershipIdentifier
     * @return array
     */
    public function createOrUpdateDomainOwnershipIdentifier(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName,
        array $domainOwnershipIdentifier
    )
    {
        return $this->_CreateOrUpdateDomainOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName,
            'domainOwnershipIdentifier' => $domainOwnershipIdentifier
        ]);
    }
    /**
     * Deletes a domain ownership identifier for a web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     */
    public function deleteDomainOwnershipIdentifier(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName
    )
    {
        return $this->_DeleteDomainOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName
        ]);
    }
    /**
     * Creates a domain ownership identifier for web app, or updates an existing ownership identifier.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @param array $domainOwnershipIdentifier
     * @return array
     */
    public function updateDomainOwnershipIdentifier(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName,
        array $domainOwnershipIdentifier
    )
    {
        return $this->_UpdateDomainOwnershipIdentifier_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName,
            'domainOwnershipIdentifier' => $domainOwnershipIdentifier
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getMSDeployStatus(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetMSDeployStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param array $mSDeploy
     * @return array
     */
    public function createMSDeployOperation(
        $resourceGroupName,
        $name,
        array $mSDeploy
    )
    {
        return $this->_CreateMSDeployOperation_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'MSDeploy' => $mSDeploy
        ]);
    }
    /**
     * Invoke the MSDeploy Log web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getMSDeployLog(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetMSDeployLog_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Fetch a short lived token that can be exchanged for a master key.
     * @param string $resourceGroupName
     * @param string $name
     * @return string
     */
    public function getFunctionsAdminToken(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetFunctionsAdminToken_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get hostname bindings for an app or a deployment slot.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listHostNameBindings(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListHostNameBindings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get the named hostname binding for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $hostName
     * @return array
     */
    public function getHostNameBinding(
        $resourceGroupName,
        $name,
        $hostName
    )
    {
        return $this->_GetHostNameBinding_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'hostName' => $hostName
        ]);
    }
    /**
     * Creates a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $hostName
     * @param array $hostNameBinding
     * @return array
     */
    public function createOrUpdateHostNameBinding(
        $resourceGroupName,
        $name,
        $hostName,
        array $hostNameBinding
    )
    {
        return $this->_CreateOrUpdateHostNameBinding_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'hostName' => $hostName,
            'hostNameBinding' => $hostNameBinding
        ]);
    }
    /**
     * Deletes a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $hostName
     */
    public function deleteHostNameBinding(
        $resourceGroupName,
        $name,
        $hostName
    )
    {
        return $this->_DeleteHostNameBinding_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'hostName' => $hostName
        ]);
    }
    /**
     * Retrieves a specific Service Bus Hybrid Connection used by this Web App.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function getHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_GetHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Creates a new Hybrid Connection using a Service Bus relay.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param array $connectionEnvelope
     * @return array
     */
    public function createOrUpdateHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        array $connectionEnvelope
    )
    {
        return $this->_CreateOrUpdateHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Removes a Hybrid Connection from this site.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     */
    public function deleteHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_DeleteHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Creates a new Hybrid Connection using a Service Bus relay.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param array $connectionEnvelope
     * @return array
     */
    public function updateHybridConnection(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        array $connectionEnvelope
    )
    {
        return $this->_UpdateHybridConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Gets the send key name and value for a Hybrid Connection.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @return array
     */
    public function listHybridConnectionKeys(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName
    )
    {
        return $this->_ListHybridConnectionKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName
        ]);
    }
    /**
     * Retrieves all Service Bus Hybrid Connections used by this Web App.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listHybridConnections(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListHybridConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets hybrid connections configured for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listRelayServiceConnections(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListRelayServiceConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets a hybrid connection configuration by its name.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @return array
     */
    public function getRelayServiceConnection(
        $resourceGroupName,
        $name,
        $entityName
    )
    {
        return $this->_GetRelayServiceConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName
        ]);
    }
    /**
     * Creates a new hybrid connection configuration (PUT), or updates an existing one (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @param array $connectionEnvelope
     * @return array
     */
    public function createOrUpdateRelayServiceConnection(
        $resourceGroupName,
        $name,
        $entityName,
        array $connectionEnvelope
    )
    {
        return $this->_CreateOrUpdateRelayServiceConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Deletes a relay service connection by its name.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     */
    public function deleteRelayServiceConnection(
        $resourceGroupName,
        $name,
        $entityName
    )
    {
        return $this->_DeleteRelayServiceConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName
        ]);
    }
    /**
     * Creates a new hybrid connection configuration (PUT), or updates an existing one (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @param array $connectionEnvelope
     * @return array
     */
    public function updateRelayServiceConnection(
        $resourceGroupName,
        $name,
        $entityName,
        array $connectionEnvelope
    )
    {
        return $this->_UpdateRelayServiceConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Gets all scale-out instances of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listInstanceIdentifiers(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListInstanceIdentifiers_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * List deployments for an app, or a deployment slot, or for an instance of a scaled-out app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $instanceId
     * @return array
     */
    public function listInstanceDeployments(
        $resourceGroupName,
        $name,
        $instanceId
    )
    {
        return $this->_ListInstanceDeployments_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Get a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $instanceId
     * @return array
     */
    public function getInstanceDeployment(
        $resourceGroupName,
        $name,
        $id,
        $instanceId
    )
    {
        return $this->_GetInstanceDeployment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Create a deployment for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $instanceId
     * @param array $deployment
     * @return array
     */
    public function createInstanceDeployment(
        $resourceGroupName,
        $name,
        $id,
        $instanceId,
        array $deployment
    )
    {
        return $this->_CreateInstanceDeployment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'instanceId' => $instanceId,
            'deployment' => $deployment
        ]);
    }
    /**
     * Delete a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $instanceId
     */
    public function deleteInstanceDeployment(
        $resourceGroupName,
        $name,
        $id,
        $instanceId
    )
    {
        return $this->_DeleteInstanceDeployment_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $instanceId
     * @return array
     */
    public function getInstanceMsDeployStatus(
        $resourceGroupName,
        $name,
        $instanceId
    )
    {
        return $this->_GetInstanceMsDeployStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $instanceId
     * @param array $mSDeploy
     * @return array
     */
    public function createInstanceMSDeployOperation(
        $resourceGroupName,
        $name,
        $instanceId,
        array $mSDeploy
    )
    {
        return $this->_CreateInstanceMSDeployOperation_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'instanceId' => $instanceId,
            'MSDeploy' => $mSDeploy
        ]);
    }
    /**
     * Invoke the MSDeploy Log web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $instanceId
     * @return array
     */
    public function getInstanceMSDeployLog(
        $resourceGroupName,
        $name,
        $instanceId
    )
    {
        return $this->_GetInstanceMSDeployLog_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Shows whether an app can be cloned to another resource group or subscription.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function isCloneable(
        $resourceGroupName,
        $name
    )
    {
        return $this->_IsCloneable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets all metric definitions of an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listMetricDefinitions(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets performance metrics of an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean|null $details
     * @param string|null $_filter
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $name,
        $details = null,
        $_filter = null
    )
    {
        return $this->_ListMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'details' => $details,
            '$filter' => $_filter
        ]);
    }
    /**
     * Restores a web app.
     * @param string $subscriptionName
     * @param string $resourceGroupName
     * @param string $name
     * @param array $migrationOptions
     * @return array
     */
    public function migrateStorage(
        $subscriptionName,
        $resourceGroupName,
        $name,
        array $migrationOptions
    )
    {
        return $this->_MigrateStorage_operation->call([
            'subscriptionName' => $subscriptionName,
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'migrationOptions' => $migrationOptions
        ]);
    }
    /**
     * Migrates a local (in-app) MySql database to a remote MySql database.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $migrationRequestEnvelope
     * @return array
     */
    public function migrateMySql(
        $resourceGroupName,
        $name,
        array $migrationRequestEnvelope
    )
    {
        return $this->_MigrateMySql_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'migrationRequestEnvelope' => $migrationRequestEnvelope
        ]);
    }
    /**
     * Returns the status of MySql in app migration, if one is active, and whether or not MySql in app is enabled
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getMigrateMySqlStatus(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetMigrateMySqlStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets all network features used by the app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $view
     * @return array
     */
    public function listNetworkFeatures(
        $resourceGroupName,
        $name,
        $view
    )
    {
        return $this->_ListNetworkFeatures_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'view' => $view
        ]);
    }
    /**
     * Start capturing network packets for the site.
     * @param string $resourceGroupName
     * @param string $name
     * @param integer|null $durationInSeconds
     * @param integer|null $maxFrameLength
     * @param string|null $sasUrl
     * @return string
     */
    public function startWebSiteNetworkTrace(
        $resourceGroupName,
        $name,
        $durationInSeconds = null,
        $maxFrameLength = null,
        $sasUrl = null
    )
    {
        return $this->_StartWebSiteNetworkTrace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'durationInSeconds' => $durationInSeconds,
            'maxFrameLength' => $maxFrameLength,
            'sasUrl' => $sasUrl
        ]);
    }
    /**
     * Stop ongoing capturing network packets for the site.
     * @param string $resourceGroupName
     * @param string $name
     * @return string
     */
    public function stopWebSiteNetworkTrace(
        $resourceGroupName,
        $name
    )
    {
        return $this->_StopWebSiteNetworkTrace_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Generates a new publishing password for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     */
    public function generateNewSitePublishingPassword(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GenerateNewSitePublishingPassword_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets perfmon counters for web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $_filter
     * @return array
     */
    public function listPerfMonCounters(
        $resourceGroupName,
        $name,
        $_filter = null
    )
    {
        return $this->_ListPerfMonCounters_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets web app's event logs.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getSitePhpErrorLogFlag(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetSitePhpErrorLogFlag_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the premier add-ons of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listPremierAddOns(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListPremierAddOns_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets a named add-on of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $premierAddOnName
     * @return array
     */
    public function getPremierAddOn(
        $resourceGroupName,
        $name,
        $premierAddOnName
    )
    {
        return $this->_GetPremierAddOn_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'premierAddOnName' => $premierAddOnName
        ]);
    }
    /**
     * Updates a named add-on of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $premierAddOnName
     * @param array $premierAddOn
     * @return array
     */
    public function addPremierAddOn(
        $resourceGroupName,
        $name,
        $premierAddOnName,
        array $premierAddOn
    )
    {
        return $this->_AddPremierAddOn_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'premierAddOnName' => $premierAddOnName,
            'premierAddOn' => $premierAddOn
        ]);
    }
    /**
     * Delete a premier add-on from an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $premierAddOnName
     */
    public function deletePremierAddOn(
        $resourceGroupName,
        $name,
        $premierAddOnName
    )
    {
        return $this->_DeletePremierAddOn_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'premierAddOnName' => $premierAddOnName
        ]);
    }
    /**
     * Get public certificates for an app or a deployment slot.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listPublicCertificates(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListPublicCertificates_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Get the named public certificate for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $publicCertificateName
     * @return array
     */
    public function getPublicCertificate(
        $resourceGroupName,
        $name,
        $publicCertificateName
    )
    {
        return $this->_GetPublicCertificate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'publicCertificateName' => $publicCertificateName
        ]);
    }
    /**
     * Creates a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $publicCertificateName
     * @param array $publicCertificate
     * @return array
     */
    public function createOrUpdatePublicCertificate(
        $resourceGroupName,
        $name,
        $publicCertificateName,
        array $publicCertificate
    )
    {
        return $this->_CreateOrUpdatePublicCertificate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'publicCertificateName' => $publicCertificateName,
            'publicCertificate' => $publicCertificate
        ]);
    }
    /**
     * Deletes a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $publicCertificateName
     */
    public function deletePublicCertificate(
        $resourceGroupName,
        $name,
        $publicCertificateName
    )
    {
        return $this->_DeletePublicCertificate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'publicCertificateName' => $publicCertificateName
        ]);
    }
    /**
     * Gets the publishing profile for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param array $publishingProfileOptions
     * @return string
     */
    public function listPublishingProfileXmlWithSecrets(
        $resourceGroupName,
        $name,
        array $publishingProfileOptions
    )
    {
        return $this->_ListPublishingProfileXmlWithSecrets_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'publishingProfileOptions' => $publishingProfileOptions
        ]);
    }
    /**
     * Recovers a deleted web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $recoveryEntity
     * @return array
     */
    public function recover(
        $resourceGroupName,
        $name,
        array $recoveryEntity
    )
    {
        return $this->_Recover_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'recoveryEntity' => $recoveryEntity
        ]);
    }
    /**
     * Resets the configuration settings of the current slot if they were previously modified by calling the API with POST.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function resetProductionSlotConfig(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ResetProductionSlotConfig_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Restarts an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param boolean|null $softRestart
     * @param boolean|null $synchronous
     */
    public function restart(
        $resourceGroupName,
        $name,
        $softRestart = null,
        $synchronous = null
    )
    {
        return $this->_Restart_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'softRestart' => $softRestart,
            'synchronous' => $synchronous
        ]);
    }
    /**
     * Gets an app's deployment slots.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listSlots(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListSlots_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the details of a web, mobile, or API app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a new web, mobile, or API app in an existing resource group, or updates an existing app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteEnvelope
     * @param string $slot
     * @param boolean|null $skipDnsRegistration
     * @param boolean|null $skipCustomDomainVerification
     * @param boolean|null $forceDnsRegistration
     * @param string|null $ttlInSeconds
     * @return array
     */
    public function createOrUpdateSlot(
        $resourceGroupName,
        $name,
        array $siteEnvelope,
        $slot,
        $skipDnsRegistration = null,
        $skipCustomDomainVerification = null,
        $forceDnsRegistration = null,
        $ttlInSeconds = null
    )
    {
        return $this->_CreateOrUpdateSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteEnvelope' => $siteEnvelope,
            'slot' => $slot,
            'skipDnsRegistration' => $skipDnsRegistration,
            'skipCustomDomainVerification' => $skipCustomDomainVerification,
            'forceDnsRegistration' => $forceDnsRegistration,
            'ttlInSeconds' => $ttlInSeconds
        ]);
    }
    /**
     * Deletes a web, mobile, or API app, or one of the deployment slots.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param boolean|null $deleteMetrics
     * @param boolean|null $deleteEmptyServerFarm
     * @param boolean|null $skipDnsRegistration
     */
    public function deleteSlot(
        $resourceGroupName,
        $name,
        $slot,
        $deleteMetrics = null,
        $deleteEmptyServerFarm = null,
        $skipDnsRegistration = null
    )
    {
        return $this->_DeleteSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'deleteMetrics' => $deleteMetrics,
            'deleteEmptyServerFarm' => $deleteEmptyServerFarm,
            'skipDnsRegistration' => $skipDnsRegistration
        ]);
    }
    /**
     * Analyze a custom hostname.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string|null $hostName
     * @return array
     */
    public function analyzeCustomHostnameSlot(
        $resourceGroupName,
        $name,
        $slot,
        $hostName = null
    )
    {
        return $this->_AnalyzeCustomHostnameSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'hostName' => $hostName
        ]);
    }
    /**
     * Applies the configuration settings from the target slot onto the current slot.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotSwapEntity
     * @param string $slot
     */
    public function applySlotConfigurationSlot(
        $resourceGroupName,
        $name,
        array $slotSwapEntity,
        $slot
    )
    {
        return $this->_ApplySlotConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotSwapEntity' => $slotSwapEntity,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a backup of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $request
     * @param string $slot
     * @return array
     */
    public function backupSlot(
        $resourceGroupName,
        $name,
        array $request,
        $slot
    )
    {
        return $this->_BackupSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'request' => $request,
            'slot' => $slot
        ]);
    }
    /**
     * Gets existing backups of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listBackupsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListBackupsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Discovers an existing app backup that can be restored from a blob in Azure storage.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $request
     * @param string $slot
     * @return array
     */
    public function discoverRestoreSlot(
        $resourceGroupName,
        $name,
        array $request,
        $slot
    )
    {
        return $this->_DiscoverRestoreSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'request' => $request,
            'slot' => $slot
        ]);
    }
    /**
     * Gets a backup of an app by its ID.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @param string $slot
     * @return array
     */
    public function getBackupStatusSlot(
        $resourceGroupName,
        $name,
        $backupId,
        $slot
    )
    {
        return $this->_GetBackupStatusSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes a backup of an app by its ID.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @param string $slot
     */
    public function deleteBackupSlot(
        $resourceGroupName,
        $name,
        $backupId,
        $slot
    )
    {
        return $this->_DeleteBackupSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId,
            'slot' => $slot
        ]);
    }
    /**
     * Gets status of a web app backup that may be in progress, including secrets associated with the backup, such as the Azure Storage SAS URL. Also can be used to update the SAS URL for the backup if a new URL is passed in the request body.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @param array $request
     * @param string $slot
     * @return array
     */
    public function listBackupStatusSecretsSlot(
        $resourceGroupName,
        $name,
        $backupId,
        array $request,
        $slot
    )
    {
        return $this->_ListBackupStatusSecretsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId,
            'request' => $request,
            'slot' => $slot
        ]);
    }
    /**
     * Restores a specific backup to another app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $backupId
     * @param array $request
     * @param string $slot
     * @return array
     */
    public function restoreSlot(
        $resourceGroupName,
        $name,
        $backupId,
        array $request,
        $slot
    )
    {
        return $this->_RestoreSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'backupId' => $backupId,
            'request' => $request,
            'slot' => $slot
        ]);
    }
    /**
     * List the configurations of an app
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listConfigurationsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListConfigurationsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Replaces the application settings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $appSettings
     * @param string $slot
     * @return array
     */
    public function updateApplicationSettingsSlot(
        $resourceGroupName,
        $name,
        array $appSettings,
        $slot
    )
    {
        return $this->_UpdateApplicationSettingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'appSettings' => $appSettings,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the application settings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listApplicationSettingsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListApplicationSettingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the Authentication / Authorization settings associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteAuthSettings
     * @param string $slot
     * @return array
     */
    public function updateAuthSettingsSlot(
        $resourceGroupName,
        $name,
        array $siteAuthSettings,
        $slot
    )
    {
        return $this->_UpdateAuthSettingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteAuthSettings' => $siteAuthSettings,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the Authentication/Authorization settings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getAuthSettingsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetAuthSettingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the backup configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $request
     * @param string $slot
     * @return array
     */
    public function updateBackupConfigurationSlot(
        $resourceGroupName,
        $name,
        array $request,
        $slot
    )
    {
        return $this->_UpdateBackupConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'request' => $request,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes the backup configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function deleteBackupConfigurationSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_DeleteBackupConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the backup configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getBackupConfigurationSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetBackupConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Replaces the connection strings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $connectionStrings
     * @param string $slot
     * @return array
     */
    public function updateConnectionStringsSlot(
        $resourceGroupName,
        $name,
        array $connectionStrings,
        $slot
    )
    {
        return $this->_UpdateConnectionStringsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'connectionStrings' => $connectionStrings,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the connection strings of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listConnectionStringsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListConnectionStringsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the logging configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getDiagnosticLogsConfigurationSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetDiagnosticLogsConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the logging configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteLogsConfig
     * @param string $slot
     * @return array
     */
    public function updateDiagnosticLogsConfigSlot(
        $resourceGroupName,
        $name,
        array $siteLogsConfig,
        $slot
    )
    {
        return $this->_UpdateDiagnosticLogsConfigSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteLogsConfig' => $siteLogsConfig,
            'slot' => $slot
        ]);
    }
    /**
     * Replaces the metadata of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $metadata
     * @param string $slot
     * @return array
     */
    public function updateMetadataSlot(
        $resourceGroupName,
        $name,
        array $metadata,
        $slot
    )
    {
        return $this->_UpdateMetadataSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'metadata' => $metadata,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the metadata of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listMetadataSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListMetadataSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the Git/FTP publishing credentials of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listPublishingCredentialsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListPublishingCredentialsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the Push settings associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $pushSettings
     * @param string $slot
     * @return array
     */
    public function updateSitePushSettingsSlot(
        $resourceGroupName,
        $name,
        array $pushSettings,
        $slot
    )
    {
        return $this->_UpdateSitePushSettingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'pushSettings' => $pushSettings,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the Push settings associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listSitePushSettingsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListSitePushSettingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the configuration of an app, such as platform version and bitness, default documents, virtual applications, Always On, etc.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getConfigurationSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteConfig
     * @param string $slot
     * @return array
     */
    public function createOrUpdateConfigurationSlot(
        $resourceGroupName,
        $name,
        array $siteConfig,
        $slot
    )
    {
        return $this->_CreateOrUpdateConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteConfig' => $siteConfig,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteConfig
     * @param string $slot
     * @return array
     */
    public function updateConfigurationSlot(
        $resourceGroupName,
        $name,
        array $siteConfig,
        $slot
    )
    {
        return $this->_UpdateConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteConfig' => $siteConfig,
            'slot' => $slot
        ]);
    }
    /**
     * Gets a list of web app configuration snapshots identifiers. Each element of the list contains a timestamp and the ID of the snapshot.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array[]
     */
    public function listConfigurationSnapshotInfoSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListConfigurationSnapshotInfoSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets a snapshot of the configuration of an app at a previous point in time.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $snapshotId
     * @param string $slot
     * @return array
     */
    public function getConfigurationSnapshotSlot(
        $resourceGroupName,
        $name,
        $snapshotId,
        $slot
    )
    {
        return $this->_GetConfigurationSnapshotSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'snapshotId' => $snapshotId,
            'slot' => $slot
        ]);
    }
    /**
     * Reverts the configuration of an app to a previous snapshot.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $snapshotId
     * @param string $slot
     */
    public function recoverSiteConfigurationSnapshotSlot(
        $resourceGroupName,
        $name,
        $snapshotId,
        $slot
    )
    {
        return $this->_RecoverSiteConfigurationSnapshotSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'snapshotId' => $snapshotId,
            'slot' => $slot
        ]);
    }
    /**
     * List deployments for an app, or a deployment slot, or for an instance of a scaled-out app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listDeploymentsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListDeploymentsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Get a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $slot
     * @return array
     */
    public function getDeploymentSlot(
        $resourceGroupName,
        $name,
        $id,
        $slot
    )
    {
        return $this->_GetDeploymentSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'slot' => $slot
        ]);
    }
    /**
     * Create a deployment for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $slot
     * @param array $deployment
     * @return array
     */
    public function createDeploymentSlot(
        $resourceGroupName,
        $name,
        $id,
        $slot,
        array $deployment
    )
    {
        return $this->_CreateDeploymentSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'slot' => $slot,
            'deployment' => $deployment
        ]);
    }
    /**
     * Delete a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $slot
     */
    public function deleteDeploymentSlot(
        $resourceGroupName,
        $name,
        $id,
        $slot
    )
    {
        return $this->_DeleteDeploymentSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'slot' => $slot
        ]);
    }
    /**
     * Lists ownership identifiers for domain associated with web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listDomainOwnershipIdentifiersSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListDomainOwnershipIdentifiersSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Get domain ownership identifier for web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @param string $slot
     * @return array
     */
    public function getDomainOwnershipIdentifierSlot(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName,
        $slot
    )
    {
        return $this->_GetDomainOwnershipIdentifierSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a domain ownership identifier for web app, or updates an existing ownership identifier.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @param array $domainOwnershipIdentifier
     * @param string $slot
     * @return array
     */
    public function createOrUpdateDomainOwnershipIdentifierSlot(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName,
        array $domainOwnershipIdentifier,
        $slot
    )
    {
        return $this->_CreateOrUpdateDomainOwnershipIdentifierSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName,
            'domainOwnershipIdentifier' => $domainOwnershipIdentifier,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes a domain ownership identifier for a web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @param string $slot
     */
    public function deleteDomainOwnershipIdentifierSlot(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName,
        $slot
    )
    {
        return $this->_DeleteDomainOwnershipIdentifierSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a domain ownership identifier for web app, or updates an existing ownership identifier.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $domainOwnershipIdentifierName
     * @param array $domainOwnershipIdentifier
     * @param string $slot
     * @return array
     */
    public function updateDomainOwnershipIdentifierSlot(
        $resourceGroupName,
        $name,
        $domainOwnershipIdentifierName,
        array $domainOwnershipIdentifier,
        $slot
    )
    {
        return $this->_UpdateDomainOwnershipIdentifierSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'domainOwnershipIdentifierName' => $domainOwnershipIdentifierName,
            'domainOwnershipIdentifier' => $domainOwnershipIdentifier,
            'slot' => $slot
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getMSDeployStatusSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetMSDeployStatusSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param array $mSDeploy
     * @return array
     */
    public function createMSDeployOperationSlot(
        $resourceGroupName,
        $name,
        $slot,
        array $mSDeploy
    )
    {
        return $this->_CreateMSDeployOperationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'MSDeploy' => $mSDeploy
        ]);
    }
    /**
     * Invoke the MSDeploy Log web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getMSDeployLogSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetMSDeployLogSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Fetch a short lived token that can be exchanged for a master key.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return string
     */
    public function getFunctionsAdminTokenSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetFunctionsAdminTokenSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Get hostname bindings for an app or a deployment slot.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listHostNameBindingsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListHostNameBindingsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Get the named hostname binding for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $hostName
     * @return array
     */
    public function getHostNameBindingSlot(
        $resourceGroupName,
        $name,
        $slot,
        $hostName
    )
    {
        return $this->_GetHostNameBindingSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'hostName' => $hostName
        ]);
    }
    /**
     * Creates a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $hostName
     * @param array $hostNameBinding
     * @param string $slot
     * @return array
     */
    public function createOrUpdateHostNameBindingSlot(
        $resourceGroupName,
        $name,
        $hostName,
        array $hostNameBinding,
        $slot
    )
    {
        return $this->_CreateOrUpdateHostNameBindingSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'hostName' => $hostName,
            'hostNameBinding' => $hostNameBinding,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $hostName
     */
    public function deleteHostNameBindingSlot(
        $resourceGroupName,
        $name,
        $slot,
        $hostName
    )
    {
        return $this->_DeleteHostNameBindingSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'hostName' => $hostName
        ]);
    }
    /**
     * Retrieves a specific Service Bus Hybrid Connection used by this Web App.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param string $slot
     * @return array
     */
    public function getHybridConnectionSlot(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        $slot
    )
    {
        return $this->_GetHybridConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a new Hybrid Connection using a Service Bus relay.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function createOrUpdateHybridConnectionSlot(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_CreateOrUpdateHybridConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Removes a Hybrid Connection from this site.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param string $slot
     */
    public function deleteHybridConnectionSlot(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        $slot
    )
    {
        return $this->_DeleteHybridConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a new Hybrid Connection using a Service Bus relay.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function updateHybridConnectionSlot(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_UpdateHybridConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the send key name and value for a Hybrid Connection.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $namespaceName
     * @param string $relayName
     * @param string $slot
     * @return array
     */
    public function listHybridConnectionKeysSlot(
        $resourceGroupName,
        $name,
        $namespaceName,
        $relayName,
        $slot
    )
    {
        return $this->_ListHybridConnectionKeysSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'namespaceName' => $namespaceName,
            'relayName' => $relayName,
            'slot' => $slot
        ]);
    }
    /**
     * Retrieves all Service Bus Hybrid Connections used by this Web App.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listHybridConnectionsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListHybridConnectionsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets hybrid connections configured for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listRelayServiceConnectionsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListRelayServiceConnectionsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets a hybrid connection configuration by its name.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @param string $slot
     * @return array
     */
    public function getRelayServiceConnectionSlot(
        $resourceGroupName,
        $name,
        $entityName,
        $slot
    )
    {
        return $this->_GetRelayServiceConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a new hybrid connection configuration (PUT), or updates an existing one (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function createOrUpdateRelayServiceConnectionSlot(
        $resourceGroupName,
        $name,
        $entityName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_CreateOrUpdateRelayServiceConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes a relay service connection by its name.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @param string $slot
     */
    public function deleteRelayServiceConnectionSlot(
        $resourceGroupName,
        $name,
        $entityName,
        $slot
    )
    {
        return $this->_DeleteRelayServiceConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName,
            'slot' => $slot
        ]);
    }
    /**
     * Creates a new hybrid connection configuration (PUT), or updates an existing one (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $entityName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function updateRelayServiceConnectionSlot(
        $resourceGroupName,
        $name,
        $entityName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_UpdateRelayServiceConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'entityName' => $entityName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Gets all scale-out instances of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listInstanceIdentifiersSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListInstanceIdentifiersSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * List deployments for an app, or a deployment slot, or for an instance of a scaled-out app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $instanceId
     * @return array
     */
    public function listInstanceDeploymentsSlot(
        $resourceGroupName,
        $name,
        $slot,
        $instanceId
    )
    {
        return $this->_ListInstanceDeploymentsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Get a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $slot
     * @param string $instanceId
     * @return array
     */
    public function getInstanceDeploymentSlot(
        $resourceGroupName,
        $name,
        $id,
        $slot,
        $instanceId
    )
    {
        return $this->_GetInstanceDeploymentSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'slot' => $slot,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Create a deployment for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $slot
     * @param string $instanceId
     * @param array $deployment
     * @return array
     */
    public function createInstanceDeploymentSlot(
        $resourceGroupName,
        $name,
        $id,
        $slot,
        $instanceId,
        array $deployment
    )
    {
        return $this->_CreateInstanceDeploymentSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'slot' => $slot,
            'instanceId' => $instanceId,
            'deployment' => $deployment
        ]);
    }
    /**
     * Delete a deployment by its ID for an app, a specific deployment slot, and/or a specific scaled-out instance.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $id
     * @param string $slot
     * @param string $instanceId
     */
    public function deleteInstanceDeploymentSlot(
        $resourceGroupName,
        $name,
        $id,
        $slot,
        $instanceId
    )
    {
        return $this->_DeleteInstanceDeploymentSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'id' => $id,
            'slot' => $slot,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $instanceId
     * @return array
     */
    public function getInstanceMsDeployStatusSlot(
        $resourceGroupName,
        $name,
        $slot,
        $instanceId
    )
    {
        return $this->_GetInstanceMsDeployStatusSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Invoke the MSDeploy web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $instanceId
     * @param array $mSDeploy
     * @return array
     */
    public function createInstanceMSDeployOperationSlot(
        $resourceGroupName,
        $name,
        $slot,
        $instanceId,
        array $mSDeploy
    )
    {
        return $this->_CreateInstanceMSDeployOperationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'instanceId' => $instanceId,
            'MSDeploy' => $mSDeploy
        ]);
    }
    /**
     * Invoke the MSDeploy Log web app extension as pass-through API
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $instanceId
     * @return array
     */
    public function getInstanceMSDeployLogSlot(
        $resourceGroupName,
        $name,
        $slot,
        $instanceId
    )
    {
        return $this->_GetInstanceMSDeployLogSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'instanceId' => $instanceId
        ]);
    }
    /**
     * Shows whether an app can be cloned to another resource group or subscription.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function isCloneableSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_IsCloneableSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets all metric definitions of an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listMetricDefinitionsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListMetricDefinitionsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets performance metrics of an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param boolean|null $details
     * @param string|null $_filter
     * @return array
     */
    public function listMetricsSlot(
        $resourceGroupName,
        $name,
        $slot,
        $details = null,
        $_filter = null
    )
    {
        return $this->_ListMetricsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'details' => $details,
            '$filter' => $_filter
        ]);
    }
    /**
     * Returns the status of MySql in app migration, if one is active, and whether or not MySql in app is enabled
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getMigrateMySqlStatusSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetMigrateMySqlStatusSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets all network features used by the app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $view
     * @param string $slot
     * @return array
     */
    public function listNetworkFeaturesSlot(
        $resourceGroupName,
        $name,
        $view,
        $slot
    )
    {
        return $this->_ListNetworkFeaturesSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'view' => $view,
            'slot' => $slot
        ]);
    }
    /**
     * Start capturing network packets for the site.
     * @param string $resourceGroupName
     * @param string $name
     * @param integer|null $durationInSeconds
     * @param string $slot
     * @param integer|null $maxFrameLength
     * @param string|null $sasUrl
     * @return string
     */
    public function startWebSiteNetworkTraceSlot(
        $resourceGroupName,
        $name,
        $durationInSeconds = null,
        $slot,
        $maxFrameLength = null,
        $sasUrl = null
    )
    {
        return $this->_StartWebSiteNetworkTraceSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'durationInSeconds' => $durationInSeconds,
            'slot' => $slot,
            'maxFrameLength' => $maxFrameLength,
            'sasUrl' => $sasUrl
        ]);
    }
    /**
     * Stop ongoing capturing network packets for the site.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return string
     */
    public function stopWebSiteNetworkTraceSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_StopWebSiteNetworkTraceSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Generates a new publishing password for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function generateNewSitePublishingPasswordSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GenerateNewSitePublishingPasswordSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets perfmon counters for web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string|null $_filter
     * @return array
     */
    public function listPerfMonCountersSlot(
        $resourceGroupName,
        $name,
        $slot,
        $_filter = null
    )
    {
        return $this->_ListPerfMonCountersSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets web app's event logs.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getSitePhpErrorLogFlagSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetSitePhpErrorLogFlagSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the premier add-ons of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listPremierAddOnsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListPremierAddOnsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets a named add-on of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $premierAddOnName
     * @param string $slot
     * @return array
     */
    public function getPremierAddOnSlot(
        $resourceGroupName,
        $name,
        $premierAddOnName,
        $slot
    )
    {
        return $this->_GetPremierAddOnSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'premierAddOnName' => $premierAddOnName,
            'slot' => $slot
        ]);
    }
    /**
     * Updates a named add-on of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $premierAddOnName
     * @param array $premierAddOn
     * @param string $slot
     * @return array
     */
    public function addPremierAddOnSlot(
        $resourceGroupName,
        $name,
        $premierAddOnName,
        array $premierAddOn,
        $slot
    )
    {
        return $this->_AddPremierAddOnSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'premierAddOnName' => $premierAddOnName,
            'premierAddOn' => $premierAddOn,
            'slot' => $slot
        ]);
    }
    /**
     * Delete a premier add-on from an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $premierAddOnName
     * @param string $slot
     */
    public function deletePremierAddOnSlot(
        $resourceGroupName,
        $name,
        $premierAddOnName,
        $slot
    )
    {
        return $this->_DeletePremierAddOnSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'premierAddOnName' => $premierAddOnName,
            'slot' => $slot
        ]);
    }
    /**
     * Get public certificates for an app or a deployment slot.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listPublicCertificatesSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListPublicCertificatesSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Get the named public certificate for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $publicCertificateName
     * @return array
     */
    public function getPublicCertificateSlot(
        $resourceGroupName,
        $name,
        $slot,
        $publicCertificateName
    )
    {
        return $this->_GetPublicCertificateSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'publicCertificateName' => $publicCertificateName
        ]);
    }
    /**
     * Creates a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $publicCertificateName
     * @param array $publicCertificate
     * @param string $slot
     * @return array
     */
    public function createOrUpdatePublicCertificateSlot(
        $resourceGroupName,
        $name,
        $publicCertificateName,
        array $publicCertificate,
        $slot
    )
    {
        return $this->_CreateOrUpdatePublicCertificateSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'publicCertificateName' => $publicCertificateName,
            'publicCertificate' => $publicCertificate,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes a hostname binding for an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string $publicCertificateName
     */
    public function deletePublicCertificateSlot(
        $resourceGroupName,
        $name,
        $slot,
        $publicCertificateName
    )
    {
        return $this->_DeletePublicCertificateSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'publicCertificateName' => $publicCertificateName
        ]);
    }
    /**
     * Gets the publishing profile for an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param array $publishingProfileOptions
     * @param string $slot
     * @return string
     */
    public function listPublishingProfileXmlWithSecretsSlot(
        $resourceGroupName,
        $name,
        array $publishingProfileOptions,
        $slot
    )
    {
        return $this->_ListPublishingProfileXmlWithSecretsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'publishingProfileOptions' => $publishingProfileOptions,
            'slot' => $slot
        ]);
    }
    /**
     * Recovers a deleted web app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $recoveryEntity
     * @param string $slot
     * @return array
     */
    public function recoverSlot(
        $resourceGroupName,
        $name,
        array $recoveryEntity,
        $slot
    )
    {
        return $this->_RecoverSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'recoveryEntity' => $recoveryEntity,
            'slot' => $slot
        ]);
    }
    /**
     * Resets the configuration settings of the current slot if they were previously modified by calling the API with POST.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function resetSlotConfigurationSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ResetSlotConfigurationSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Restarts an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param boolean|null $softRestart
     * @param boolean|null $synchronous
     */
    public function restartSlot(
        $resourceGroupName,
        $name,
        $slot,
        $softRestart = null,
        $synchronous = null
    )
    {
        return $this->_RestartSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            'softRestart' => $softRestart,
            'synchronous' => $synchronous
        ]);
    }
    /**
     * Get the difference in configuration settings between two web app slots.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotSwapEntity
     * @param string $slot
     * @return array
     */
    public function listSlotDifferencesSlot(
        $resourceGroupName,
        $name,
        array $slotSwapEntity,
        $slot
    )
    {
        return $this->_ListSlotDifferencesSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotSwapEntity' => $slotSwapEntity,
            'slot' => $slot
        ]);
    }
    /**
     * Swaps two deployment slots of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotSwapEntity
     * @param string $slot
     */
    public function swapSlotSlot(
        $resourceGroupName,
        $name,
        array $slotSwapEntity,
        $slot
    )
    {
        return $this->_SwapSlotSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotSwapEntity' => $slotSwapEntity,
            'slot' => $slot
        ]);
    }
    /**
     * Returns all Snapshots to the user.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function listSnapshotsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListSnapshotsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the source control configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array
     */
    public function getSourceControlSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_GetSourceControlSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Updates the source control configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteSourceControl
     * @param string $slot
     * @return array
     */
    public function createOrUpdateSourceControlSlot(
        $resourceGroupName,
        $name,
        array $siteSourceControl,
        $slot
    )
    {
        return $this->_CreateOrUpdateSourceControlSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteSourceControl' => $siteSourceControl,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes the source control configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function deleteSourceControlSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_DeleteSourceControlSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Starts an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function startSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_StartSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Stops an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function stopSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_StopSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Sync web app repository.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function syncRepositorySlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_SyncRepositorySlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Syncs function trigger metadata to the scale controller
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     */
    public function syncFunctionTriggersSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_SyncFunctionTriggersSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets the quota usage information of an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @param string|null $_filter
     * @return array
     */
    public function listUsagesSlot(
        $resourceGroupName,
        $name,
        $slot,
        $_filter = null
    )
    {
        return $this->_ListUsagesSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the virtual networks the app (or deployment slot) is connected to.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $slot
     * @return array[]
     */
    public function listVnetConnectionsSlot(
        $resourceGroupName,
        $name,
        $slot
    )
    {
        return $this->_ListVnetConnectionsSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slot' => $slot
        ]);
    }
    /**
     * Gets a virtual network the app (or deployment slot) is connected to by name.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $slot
     * @return array
     */
    public function getVnetConnectionSlot(
        $resourceGroupName,
        $name,
        $vnetName,
        $slot
    )
    {
        return $this->_GetVnetConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'slot' => $slot
        ]);
    }
    /**
     * Adds a Virtual Network connection to an app or slot (PUT) or updates the connection properties (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function createOrUpdateVnetConnectionSlot(
        $resourceGroupName,
        $name,
        $vnetName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_CreateOrUpdateVnetConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Deletes a connection from an app (or deployment slot to a named virtual network.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $slot
     */
    public function deleteVnetConnectionSlot(
        $resourceGroupName,
        $name,
        $vnetName,
        $slot
    )
    {
        return $this->_DeleteVnetConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'slot' => $slot
        ]);
    }
    /**
     * Adds a Virtual Network connection to an app or slot (PUT) or updates the connection properties (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function updateVnetConnectionSlot(
        $resourceGroupName,
        $name,
        $vnetName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_UpdateVnetConnectionSlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Gets an app's Virtual Network gateway.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @param string $slot
     * @return array
     */
    public function getVnetConnectionGatewaySlot(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName,
        $slot
    )
    {
        return $this->_GetVnetConnectionGatewaySlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName,
            'slot' => $slot
        ]);
    }
    /**
     * Adds a gateway to a connected Virtual Network (PUT) or updates it (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function createOrUpdateVnetConnectionGatewaySlot(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_CreateOrUpdateVnetConnectionGatewaySlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Adds a gateway to a connected Virtual Network (PUT) or updates it (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @param array $connectionEnvelope
     * @param string $slot
     * @return array
     */
    public function updateVnetConnectionGatewaySlot(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName,
        array $connectionEnvelope,
        $slot
    )
    {
        return $this->_UpdateVnetConnectionGatewaySlot_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName,
            'connectionEnvelope' => $connectionEnvelope,
            'slot' => $slot
        ]);
    }
    /**
     * Get the difference in configuration settings between two web app slots.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotSwapEntity
     * @return array
     */
    public function listSlotDifferencesFromProduction(
        $resourceGroupName,
        $name,
        array $slotSwapEntity
    )
    {
        return $this->_ListSlotDifferencesFromProduction_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotSwapEntity' => $slotSwapEntity
        ]);
    }
    /**
     * Swaps two deployment slots of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $slotSwapEntity
     */
    public function swapSlotWithProduction(
        $resourceGroupName,
        $name,
        array $slotSwapEntity
    )
    {
        return $this->_SwapSlotWithProduction_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'slotSwapEntity' => $slotSwapEntity
        ]);
    }
    /**
     * Returns all Snapshots to the user.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function listSnapshots(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListSnapshots_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the source control configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function getSourceControl(
        $resourceGroupName,
        $name
    )
    {
        return $this->_GetSourceControl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Updates the source control configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $siteSourceControl
     * @return array
     */
    public function createOrUpdateSourceControl(
        $resourceGroupName,
        $name,
        array $siteSourceControl
    )
    {
        return $this->_CreateOrUpdateSourceControl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'siteSourceControl' => $siteSourceControl
        ]);
    }
    /**
     * Deletes the source control configuration of an app.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function deleteSourceControl(
        $resourceGroupName,
        $name
    )
    {
        return $this->_DeleteSourceControl_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Starts an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     */
    public function start(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Stops an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     */
    public function stop(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Sync web app repository.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function syncRepository(
        $resourceGroupName,
        $name
    )
    {
        return $this->_SyncRepository_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Syncs function trigger metadata to the scale controller
     * @param string $resourceGroupName
     * @param string $name
     */
    public function syncFunctionTriggers(
        $resourceGroupName,
        $name
    )
    {
        return $this->_SyncFunctionTriggers_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the quota usage information of an app (or deployment slot, if specified).
     * @param string $resourceGroupName
     * @param string $name
     * @param string|null $_filter
     * @return array
     */
    public function listUsages(
        $resourceGroupName,
        $name,
        $_filter = null
    )
    {
        return $this->_ListUsages_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets the virtual networks the app (or deployment slot) is connected to.
     * @param string $resourceGroupName
     * @param string $name
     * @return array[]
     */
    public function listVnetConnections(
        $resourceGroupName,
        $name
    )
    {
        return $this->_ListVnetConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets a virtual network the app (or deployment slot) is connected to by name.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @return array
     */
    public function getVnetConnection(
        $resourceGroupName,
        $name,
        $vnetName
    )
    {
        return $this->_GetVnetConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName
        ]);
    }
    /**
     * Adds a Virtual Network connection to an app or slot (PUT) or updates the connection properties (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param array $connectionEnvelope
     * @return array
     */
    public function createOrUpdateVnetConnection(
        $resourceGroupName,
        $name,
        $vnetName,
        array $connectionEnvelope
    )
    {
        return $this->_CreateOrUpdateVnetConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Deletes a connection from an app (or deployment slot to a named virtual network.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     */
    public function deleteVnetConnection(
        $resourceGroupName,
        $name,
        $vnetName
    )
    {
        return $this->_DeleteVnetConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName
        ]);
    }
    /**
     * Adds a Virtual Network connection to an app or slot (PUT) or updates the connection properties (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param array $connectionEnvelope
     * @return array
     */
    public function updateVnetConnection(
        $resourceGroupName,
        $name,
        $vnetName,
        array $connectionEnvelope
    )
    {
        return $this->_UpdateVnetConnection_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Gets an app's Virtual Network gateway.
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @return array
     */
    public function getVnetConnectionGateway(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName
    )
    {
        return $this->_GetVnetConnectionGateway_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName
        ]);
    }
    /**
     * Adds a gateway to a connected Virtual Network (PUT) or updates it (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @param array $connectionEnvelope
     * @return array
     */
    public function createOrUpdateVnetConnectionGateway(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName,
        array $connectionEnvelope
    )
    {
        return $this->_CreateOrUpdateVnetConnectionGateway_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * Adds a gateway to a connected Virtual Network (PUT) or updates it (PATCH).
     * @param string $resourceGroupName
     * @param string $name
     * @param string $vnetName
     * @param string $gatewayName
     * @param array $connectionEnvelope
     * @return array
     */
    public function updateVnetConnectionGateway(
        $resourceGroupName,
        $name,
        $vnetName,
        $gatewayName,
        array $connectionEnvelope
    )
    {
        return $this->_UpdateVnetConnectionGateway_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'vnetName' => $vnetName,
            'gatewayName' => $gatewayName,
            'connectionEnvelope' => $connectionEnvelope
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AnalyzeCustomHostname_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ApplySlotConfigToProduction_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Backup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBackups_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DiscoverRestore_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetBackupStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteBackup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBackupStatusSecrets_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Restore_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConfigurations_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateApplicationSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListApplicationSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateAuthSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAuthSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateBackupConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteBackupConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetBackupConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateConnectionStrings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnectionStrings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDiagnosticLogsConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateDiagnosticLogsConfig_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateMetadata_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetadata_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublishingCredentials_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateSitePushSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSitePushSettings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSlotConfigurationNames_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateSlotConfigurationNames_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateConfiguration_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConfigurationSnapshotInfo_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetConfigurationSnapshot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RecoverSiteConfigurationSnapshot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListDeployments_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDeployment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateDeployment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteDeployment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListDomainOwnershipIdentifiers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDomainOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateDomainOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteDomainOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateDomainOwnershipIdentifier_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMSDeployStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateMSDeployOperation_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMSDeployLog_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetFunctionsAdminToken_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHostNameBindings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetHostNameBinding_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateHostNameBinding_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteHostNameBinding_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateHybridConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHybridConnectionKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHybridConnections_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRelayServiceConnections_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetRelayServiceConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateRelayServiceConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteRelayServiceConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateRelayServiceConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListInstanceIdentifiers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListInstanceDeployments_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetInstanceDeployment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateInstanceDeployment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteInstanceDeployment_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetInstanceMsDeployStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateInstanceMSDeployOperation_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetInstanceMSDeployLog_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_IsCloneable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_MigrateStorage_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_MigrateMySql_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMigrateMySqlStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListNetworkFeatures_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_StartWebSiteNetworkTrace_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_StopWebSiteNetworkTrace_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateNewSitePublishingPassword_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPerfMonCounters_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSitePhpErrorLogFlag_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPremierAddOns_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPremierAddOn_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AddPremierAddOn_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeletePremierAddOn_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublicCertificates_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPublicCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdatePublicCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeletePublicCertificate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublishingProfileXmlWithSecrets_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Recover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResetProductionSlotConfig_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Restart_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSlots_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AnalyzeCustomHostnameSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ApplySlotConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_BackupSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBackupsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DiscoverRestoreSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetBackupStatusSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteBackupSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListBackupStatusSecretsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RestoreSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConfigurationsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateApplicationSettingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListApplicationSettingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateAuthSettingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAuthSettingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateBackupConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteBackupConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetBackupConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateConnectionStringsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnectionStringsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDiagnosticLogsConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateDiagnosticLogsConfigSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateMetadataSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetadataSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublishingCredentialsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateSitePushSettingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSitePushSettingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConfigurationSnapshotInfoSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetConfigurationSnapshotSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RecoverSiteConfigurationSnapshotSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListDeploymentsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDeploymentSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateDeploymentSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteDeploymentSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListDomainOwnershipIdentifiersSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDomainOwnershipIdentifierSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateDomainOwnershipIdentifierSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteDomainOwnershipIdentifierSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateDomainOwnershipIdentifierSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMSDeployStatusSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateMSDeployOperationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMSDeployLogSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetFunctionsAdminTokenSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHostNameBindingsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetHostNameBindingSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateHostNameBindingSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteHostNameBindingSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetHybridConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateHybridConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteHybridConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateHybridConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHybridConnectionKeysSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHybridConnectionsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRelayServiceConnectionsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetRelayServiceConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateRelayServiceConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteRelayServiceConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateRelayServiceConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListInstanceIdentifiersSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListInstanceDeploymentsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetInstanceDeploymentSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateInstanceDeploymentSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteInstanceDeploymentSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetInstanceMsDeployStatusSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateInstanceMSDeployOperationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetInstanceMSDeployLogSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_IsCloneableSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricDefinitionsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMigrateMySqlStatusSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListNetworkFeaturesSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_StartWebSiteNetworkTraceSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_StopWebSiteNetworkTraceSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateNewSitePublishingPasswordSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPerfMonCountersSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSitePhpErrorLogFlagSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPremierAddOnsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPremierAddOnSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AddPremierAddOnSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeletePremierAddOnSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublicCertificatesSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPublicCertificateSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdatePublicCertificateSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeletePublicCertificateSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublishingProfileXmlWithSecretsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RecoverSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResetSlotConfigurationSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RestartSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSlotDifferencesSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SwapSlotSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSnapshotsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSourceControlSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateSourceControlSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteSourceControlSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_StartSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_StopSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SyncRepositorySlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SyncFunctionTriggersSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListUsagesSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVnetConnectionsSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVnetConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateVnetConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteVnetConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateVnetConnectionSlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVnetConnectionGatewaySlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateVnetConnectionGatewaySlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateVnetConnectionGatewaySlot_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSlotDifferencesFromProduction_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SwapSlotWithProduction_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSnapshots_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSourceControl_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateSourceControl_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteSourceControl_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Start_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SyncRepository_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SyncFunctionTriggers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListUsages_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVnetConnections_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVnetConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateVnetConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteVnetConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateVnetConnection_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetVnetConnectionGateway_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateVnetConnectionGateway_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateVnetConnectionGateway_operation;
}

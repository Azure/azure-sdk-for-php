rem @echo off

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/advisor/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Advisor
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/analysisservices/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Analysis

rem error ApiManagement
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/apimanagement/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ApiManagement

rem error AppInsights
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/appinsights/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.AppInsights

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/authorization/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Authorization

rem error Automation
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/automation/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Automation

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/batch/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Batch
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/billing/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Billing
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/cdn/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Cdn
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/cognitiveservices/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.CognitiveServices
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/commerce/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Commerce

rem error Compute
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/compute/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Compute

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/consumption/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Consumption
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/containerregistry/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ContainerRegistry
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/cosmos-db/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.CosmosDb
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/customer-insights/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.CustomerInsights
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/datalake-analytics/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.DataLake.Analytics
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/datalake-store/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.DataLake.Store
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/devtestlabs/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.DevTestLabs
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/dns/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Dns
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/eventhub/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.EventHub

rem error HDInsight
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/hdinsight/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.HdInsight

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/intune/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Intune
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/iothub/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.IotHub
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/keyvault/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.KeyVault
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/logic/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Logic

rem error MachineLearning
rem Error: No input files provided.
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/machinelearning/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.MachineLearning

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/mediaservices/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Media
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/mobileengagement/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.MobileEngagement

rem error Monitor
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/monitor/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Monitor

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/mysql/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.MySql

rem error Network
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/network/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Network

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/notificationhubs/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.NotificationHubs

rem error OperationalInsights
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/operationalinsights/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.OperationalInsights

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/postgresql/resource-manager/readme.md  --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.PostgreSql
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/powerbiembedded/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.PowerBIEmbedded

rem error RecoveryServices
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/recoveryservices/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.RecoveryServices

rem error RecoveryServices.Backup
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/recoveryservicesbackup/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.RecoveryServices.Backup

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/recoveryservicessiterecovery/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.RecoveryServices.SiteRecovery
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/redis/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Redis
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/relay/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Relay
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/resourcehealth/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ResourceHealth

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/resources/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Resource --package-resources

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/scheduler/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Scheduler
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/search/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Search
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/servermanagement/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ServerManagement
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/service-map/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ServiceMap
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/servicebus/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ServiceBus
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/servicefabric/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.ServiceFabric

rem error Sql
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/sql/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Sql

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/storage/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.Storage
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/storageimportexport/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.StorageImportExport
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/storsimple8000series/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.StorSimple8000Series

rem error StreamAnalytics
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/streamanalytics/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.StreamAnalytics

rem error TimeSeriesInsights
rem FATAL: System.InvalidOperationException: Found incompatible property types ,  for property 'properties' in schema inheritance chain
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/timeseriesinsights/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.TimeSeriesInsights

node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/trafficmanager/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.TrafficManager
node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/visualstudio/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.VisualStudio

rem error Web
rem FATAL: AutoRest.Core.Logging.CodeGenerationException: Swagger specification is missing title in info section
rem node c:\autorest\src\autorest-core\dist\app.js --php https://github.com/Azure/azure-rest-api-specs/blob/current/specification/web/resource-manager/readme.md --output-folder=c:\users\sergey\Desktop\azure-sdk-for-php\gen --namespace=Microsoft.Azure.Management.WebSites

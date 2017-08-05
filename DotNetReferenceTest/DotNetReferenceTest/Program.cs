using Microsoft.Azure.Management.ResourceManager;
using Microsoft.Azure.Management.ResourceManager.Models;
using Microsoft.Rest.Azure.Authentication;
using Newtonsoft.Json;
using System.IO;
using System.Threading.Tasks;

namespace DotNetReferenceTest
{
    class Program
    {
        static async Task MainAsync()
        {
            var value = File.ReadAllText("C:/Users/sergey/Desktop/php-test.json");
            var credentialsInfo = JsonConvert.DeserializeObject<CredentialsInfo>(value);
            var credentials = await ApplicationTokenProvider
                .LoginSilentAsync(
                    credentialsInfo.tenantId,
                    credentialsInfo.applicationId,
                    credentialsInfo.clientSecret);
            var resourceManagement = new ResourceManagementClient(credentials);
            resourceManagement.SubscriptionId = credentialsInfo.subscriptionId;
            resourceManagement.ResourceGroups.CreateOrUpdate(
                "temp-group",
                new ResourceGroup
                {
                    Location = "East US"
                });
            var x = resourceManagement.ResourceGroups.List();
            resourceManagement.ResourceGroups.Update("temp-group", new ResourceGroupPatchable());
            resourceManagement.ResourceGroups.ExportTemplate(
                "temp-group", new ExportTemplateRequest() { Resources = new string[] { "*" } });
        }

        static void Main(string[] args)
        {
            MainAsync().Wait();
        }
    }
}
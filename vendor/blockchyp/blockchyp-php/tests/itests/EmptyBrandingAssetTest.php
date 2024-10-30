<?php

use BlockChyp\BlockChyp;

require_once(__DIR__ . '/../BlockChypTestCase.php');

class EmptyBrandingAssetTest extends BlockChypTestCase
{

    /**
     * @group itest
     */
    public function testEmptyBrandingAsset()
    {
        $config = $this->loadTestConfiguration();

        BlockChyp::setApiKey($config->apiKey);
        BlockChyp::setBearerToken($config->bearerToken);
        BlockChyp::setSigningKey($config->signingKey);
        BlockChyp::setGatewayHost($config->gatewayHost);
        BlockChyp::setTestGatewayHost($config->testGatewayHost);
        BlockChyp::setDashboardHost($config->dashboardHost);

        echo 'Running EmptyBrandingAssetTest...' . PHP_EOL;        // Set request values
        $request = [
            'notes' => 'Empty Asset',
            'enabled' => false,
        ];

        // self::logRequest($request);

         try {

            $response = BlockChyp::updateBrandingAsset($request);

            // self::logResponse($response);

            // Response assertions
    
            $this->assertTrue($response['success']);

        } catch (Exception $ex) {

            echo $ex->getTraceAsString();
            $this->assertEmpty($ex);

        }
        $this->processResponseDelay($request);
    }
}

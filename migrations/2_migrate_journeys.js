var Journeys = artifacts.require("./Journeys.sol");

module.exports = function(deployer) {
    deployer.deploy(Journeys);
};
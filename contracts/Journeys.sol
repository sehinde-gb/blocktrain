pragma solidity ^0.4.21;


contract Journeys {
    // data structure that stores a journey
    struct Journey {
        string from;
        string to;
        uint endingFare;
        address walletAddress;
        uint createdAt;
        uint updatedAt;
    }

    // it maps the journey's wallet address with the journey ID
    mapping (address => uint) public journeysIds;

    // Array of Journey that holds the list of journeys and their details
    Journey[] public journeys;

    // event fired when a new journey is registered
    event newJourneyRegistered(uint id);

    // event fired when the journey is updated
    event journeyUpdateEvent(uint id);



    // Modifier: check if the caller of the smart contract is registered
    modifier checkSenderIsRegistered {
    	require(isRegistered());
    	_;
    }



    /**
     * Constructor function
     */
    constructor() public {
        // NOTE: the first journey MUST be empty
        addJourney(0x0, "", "", 0);

        // Some dummy data
        addJourney(0x333333333333, "Pinner Underground Station", "Kilburn Underground Station", 590);
        addJourney(0x234539999999, "Willesden Underground Station", "Maida Vale Underground Station", 590);
        addJourney(0x434578222222, "Bermondsey Underground Station", "Kilburn Underground Station", 590);
    }



    /**
     * Function to register a new journey.
     *
     * @param from   Point of Origin
     * @param to     Destination
     * @param endingFare Ending Fare
     */
    function registerJourney(string from, string to, uint endingFare) public returns(uint)
    {
    	return addJourney(msg.sender, from, to, endingFare);
    }



    /**
     * Add a new journey. This function must be private because a journey
     * cannot insert another journey on behalf of someone else.
     *
     * @param wAddr 		Address wallet of the journey
     * @param from		    Point of origin
     * @param to		    Destination 
     * @param endingFare	ending Fare
    */

    function addJourney(address wAddr, string from, string to, uint endingFare) private
    returns(uint)
    {
        // checking if the journey is already registered
        uint journeyId = journeysIds[wAddr];
        require (journeyId == 0);

        // associating the journey wallet address with the new ID
        journeysIds[wAddr] = journeys.length;
        uint newJourneyId = journeys.length++;

        // storing the new journey details
        journeys[newJourneyId] = Journey({
            from: from,
            to: to,
            endingFare: endingFare,
            walletAddress: wAddr,
            createdAt: now,
            updatedAt: now
        });

        // emitting the event that a new journey has been registered
        emit newJourneyRegistered(newJourneyId);

        return newJourneyId;
    }


    /**
     * Update the journey confirmation of the caller of this method.
     * Note: the journey can modify only his own confirmation.
     *
     * @param newFrom	    The new journey's displaying from
     * @param newTo 	    The new journey's to
     * @param newendingFare The new journey's endingFare
     *
     */
    function updateJourney(string newFrom, string newTo, uint newendingFare) checkSenderIsRegistered public
    returns(uint)
    {
    	// A journey can modify only their own confirmation.
    	uint journeyId = journeysIds[msg.sender];

    	Journey storage journey = journeys[journeyId];

    	journey.from = newFrom;
    	journey.to = newTo;
        journey.endingFare = newendingFare;
    	journey.updatedAt = now;

    	emit journeyUpdateEvent(journeyId);

    	return journeyId;
    }


    /**
     * Get the journey's confirmation information.
     *
     * @param id 	The ID of the journey stored on the blockchain.
     */
    function getJourneyById(uint id) public view
    returns(
    	uint,
    	string,
    	string,
        uint,
    	address,
    	uint,
    	uint
    ) {
    	// checking if the ID is valid
    	require( (id > 0) || (id <= journeys.length) );

    	Journey memory i = journeys[id];

    	return (
    		id,
    		i.from,
    		i.to,
            i.endingFare,
    		i.walletAddress,
    		i.createdAt,
    		i.updatedAt
    	);
    }

    /**
     * Return the confirmation information of the caller.
     */
    function getOwnProfile() checkSenderIsRegistered public view
    returns(
    	uint,
    	string,
    	string,
        uint,
    	address,
    	uint,
    	uint
    ) {
    	uint id = journeysIds[msg.sender];

    	return getJourneyById(id);
    }




    /**
     * Check if the journey that is calling the smart contract is registered.
     */
    function isRegistered() public view returns (bool)
    {
    	return (journeysIds[msg.sender] != 0);
    }



    /**
     * Return the number of total registered journeys.
     */
    function totalJourneys() public view returns (uint)
    {
        return journeys.length;
    }

}
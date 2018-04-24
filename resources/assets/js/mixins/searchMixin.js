export default {
    computed: {
        filteredCards: function(){
            return this.cards.filter((card) => {
                return card.balance.match(this.search);
            });
        }
    }
};

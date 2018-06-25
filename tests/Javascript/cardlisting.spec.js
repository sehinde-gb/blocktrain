import { mount } from 'vue-test-utils';
import expect from 'expect';
import CardListings from '../../resources/assets/js/views/Cards/Users.vue';
import moxios from 'moxios';



describe ('CardListings', () => {

    it('shows the card listing if there are some', () => {

        moxios.install();

        let wrapper = mount(CardListings);

        moxios.stubRequest('/api/card', {
           status: 200,
           response: {
                name: 'deedd',
                address: 'ddeedde',
                home_phone: '23232323',
                mobile_phone: '23223',
                email: 'test@com',
                balance: '34'

           }     

        });

        expect(wrapper.contains('ul')).toBe(false);

    });
});
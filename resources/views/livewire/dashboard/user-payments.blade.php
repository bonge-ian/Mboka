<div class="uk-panel uk-overflow-auto "
     uk-overflow-auto>
    <table class="uk-table uk-table-divider uk-table-responsive uk-table-hover uk-table-middle">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user_payments as $payment)
                <tr>
                    <td class="uk-table-link">
                        <a href="{{ route('dashboard.listings.show', $payment->listing->slug) }}" class="uk-link-heading">
                            {{ $payment->listing->title }}
                        </a>
                    </td>
                    <td>
                        <p class="uk-margin-remove-vertical">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: coin"></span>
                            <span>{{ $payment->amount }}</span>
                        </p>
                    </td>
                    <td>
                        <p class="uk-margin-remove-vertical uk-text-capitalize">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: credit-card"></span>
                            <span>{{ $payment->payment_method }}</span>
                        </p>
                    </td>
                    <td>
                        <div class="uk-button uk-border-rounded uk-border uk-button-small uk-disabled ">
                            <span class="uk-icon uk-text-{{ $payment->status === 'success' ? 'success' : 'warning' }}"
                                  uk-icon="icon: circle"></span>
                            {{ $payment->status }}
                        </div>
                    </td>
                    <td>
                        <p class="uk-margin-remove-vertical">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: calender-check"></span>
                            <span>{{ $payment->paid_at->format('dS M, Y h:m a') }}</span>
                        </p>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="">
                        <x-alert message="You have made no payments." />
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $user_payments->links() }}
</div>
